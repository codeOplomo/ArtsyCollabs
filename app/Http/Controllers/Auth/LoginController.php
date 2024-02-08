<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Ensure you have a login view at resources/views/auth/login.blade.php
    }

    /**
     * Get the post login redirect path based on the user's role.
     * 
     * Override this method to implement custom redirection logic after login.
     *
     * @return string
     */
    // protected function redirectTo()
    // {
    //     // Assuming the user model has a 'role_id' attribute
    //     // if (auth()->user()->role_id == 2) {
    //     //     return '/profile'; // Redirect to profile index if role_id is 2
    //     // } else if (auth()->user()->role_id == 1) {
    //     //     return '/dashboard'; // Redirect to dashboard if role_id is 1
    //     // }
    //     if (auth()->user()->role_id == 2) {
    //         $request->session()->flash('success', 'Welcome to your profile!');
    //         return redirect('/profile'); // Ensure this URL matches your routes
    //     } else if (auth()->user()->role_id == 1) {
    //         $request->session()->flash('success', 'Welcome to the dashboard!');
    //         return redirect('/dashboard'); // Ensure this URL matches your routes
    //     }

    //     return '/'; // Default redirection if none of the conditions above are met
    // }

    /**
 * The user has been authenticated.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  mixed  $user
 * @return mixed
 */
protected function authenticated(Request $request, $user)
{
    if ($user->role_id == 2) {
        $request->session()->flash('success', 'Welcome to your profile!');
        return redirect('/profile'); // Ensure this URL matches your routes
    } else if ($user->role_id == 1) {
        $request->session()->flash('success', 'Welcome to the dashboard!');
        return redirect('/dashboard'); // Ensure this URL matches your routes
    }

    $request->session()->flash('success', 'Welcome back!');
    return redirect('/'); // Default redirection if none of the conditions above are met
}


    /**
     * Log the user out of the application.
     * 
     * Override this method if you need a custom logout logic.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Flash a logout success message
        $request->session()->flash('success', 'You have been successfully logged out.');

        return redirect('/login');
    }

}
