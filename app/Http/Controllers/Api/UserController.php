<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AuthUserRequest;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    /**
     * Store new user
     */
    public function store(StoreUserRequest $request)
    {
        if($request->validated()) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'message' => 'Account created successfully'
            ]);
        }
    }

    /**
     * Log in the user
     */

    public function auth(AuthUserRequest $request)
    {
        if($request->validated()) {
            if(auth()->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])) {
                $user = User::where('email', $request->email)->first();
                $token = $user->createToken('simple_user')->plainTextToken;

                return response()->json([
                    'success' => true,
                    'message' => 'Logged in!',
                    'user' => $user,
                    'token' => $token
                ]);

            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'These credentials do not match any of our records!',
                ]);
            }

        }
    }

    /**
     * Log out the user
     */
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'success' => true,
            'message' => 'Logout successfully',
        ]);
    }

    /**
     * Update user profile
     */
     public function updateUserProfile(User $user, Request $request) {
        $this->validate($request, [
            'user_image' => 'max:2048',
        ]);
        if($request->has('user_image')) {
            $path = public_path('storage/images/users/');
            if (File::exists($path . $user->profile_image)) {
                File::delete($path . $user->profile_image);
            }
            $user_image = $request->file('user_image');
            $user_image_name = time() . '_' . 'user'. '_' .$user_image->getClientOriginalName();
            $user_image->storeAs('images/users/', $user_image_name, 'public');
            $user->update([
                'profile_image' => $user_image_name
            ]);
        } else {
            $user->update([
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'first_address' => $request->first_address,
                'second_address' => $request->second_address,
                'zip_code' => $request->zip_code,
                'phone_number' => $request->phone_number,

            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully',
            'user' => $user->load('orders')
        ]);
     }
}
