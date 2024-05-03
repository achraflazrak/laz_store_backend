<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\AuthAdminRequest;
use Carbon\Carbon;

class AdminController extends Controller
{

    /**
     * Fetch daily & monthly orders
     */
    public function index()
    {
        //get today orders
        $todayOrders = Order::whereDay('created_at', Carbon::today())
            ->whereNull('return_date')
            ->get();

        //get yesterday orders
        $yesterdayOrders = Order::whereDay('created_at', Carbon::yesterday())
            ->whereNull('return_date')
            ->get();

        //get this month orders
        $monthOrders = Order::whereMonth('created_at', Carbon::now()->month)
            ->whereNull('return_date')
            ->get();

        return view('admin.index')->with([
            'todayOrders' => $todayOrders,
            'yesterdayOrders' => $yesterdayOrders,
            'monthOrders' => $monthOrders,
        ]);
    }

    /**
     * Display the login form
     */
    public function login()
    {
        if(!auth()->guard('admin')->check())
        {
            return view('login');
        }

        return redirect('admin/dashboard');
    }

    /**
     * Log in the admin
     */
    public function auth(AuthAdminRequest $request)
    {
        if($request->validated()) {
            $remember_me = $request->has('remember_me') ? true : false;

            if(auth()->guard('admin')->attempt([
                'email' => $request->email,
                'password'=> $request->password
            ], $remember_me)) {
                return redirect()->route('admin.index');
            }else {
                return redirect()->route('admin.login')->with([
                    'danger' => 'These credentials do not match any of our records'
                ]);
            }
        }

    }

    /**
     * Log out the admin
     */
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
