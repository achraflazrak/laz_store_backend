<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * List all users
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index')->with([
            'users' => $users
        ]);
    }

    /**
     * Delete a user
     */
     public function destroy(User $user)
     {
        $path = public_path('storage/users/images/');

        if(File::exists($path . $user->profile_image)) {
            File::delete($path . $user->profile_image);
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with([
            'success' => 'User deleted successfully'
        ]);

     }
}
