<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToProvider()
    {

        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {

        $googleUser = Socialite::driver('google')->stateless()->user();
        // dd($googleUser);
        // Find or create user
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [

                'name' => $googleUser->getName(),
                'password' => bcrypt('Google'), // Generate a random password
                'auth_provider' => 'Google',
                'auth_provider_id' => $googleUser->id,
            ]
        );

        // Log in the user
        Auth::login($user);

        return redirect()->route('thanks');
        // return redirect()->intended('/');
    }

    public function basiclogin(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Retrieve the user by email
        $user = User::where('email', $request->email)->first();

        // Check if the user exists and the password matches
        if ($user && Hash::check($request->password, $user->password)) {
            // Log the user in (for example, creating a session or token)
            Auth::login($user);

            return redirect()->route('thanks');
        }

        // If credentials are invalid, return an error response
        return response()->json([
            'message' => 'Invalid email or password.',
        ], 401);

    }

    public function logout()
    {
        Auth::logout();

        return redirect('/'); // Redirect to a thank you page or login page
    }
    public function Getusers()
    {
        $users = user::all();
        return view('auth.users', compact('users'));
    }
}
