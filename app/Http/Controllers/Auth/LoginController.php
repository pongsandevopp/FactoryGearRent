<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // เพิ่มเงื่อนไขในการตรวจสอบด้วยชื่อผู้ใช้งาน
        if (filter_var($credentials['email'], FILTER_VALIDATE_EMAIL)) {
            Auth::attempt($credentials);
        } else {
            if (Auth::attempt(['username' => $credentials['email'], 'password' => $credentials['password']])) {
                return redirect()->intended('/dashboard');
            }
        }

        return redirect()->back()->withErrors([
            'email' => 'The credentials do not match our records.',
        ]);
    }
}
