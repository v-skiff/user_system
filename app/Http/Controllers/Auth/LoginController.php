<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Mail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'login' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'login' => $request->get('login'),
            'password' => $request->get('password'),
        ]))
        {

            $code = str_random(40);
            $user = Auth::user();
            $user->code = $code;
            $user->save();

            Mail::send('verification_mail', ['code' => $code], function($message) {
                $message->to(Auth::user()->email, 'To user')->subject('Verification code');
                $message->from(Auth::user()->email, 'User system');
            });

            Auth::logout();
            return redirect('/login_2');
        }

        return redirect()->back()->with('status', 'Login or password is incorrect.');
    }

    public function login_2()
    {
        return view('pages.login_2');
    }

    public function loginByCode(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|min:40',
        ]);

        $user = User::where('code', '=', $request->post('code'))->first();
        if (!$user) {
            return redirect()->back()->with('status', 'Incorrect token.');
        }

        if (Auth::loginUsingId($user->getAuthIdentifier()))
        {
            $user->verified = 1;
            $user->save();
            return redirect('/profile');
        } else {
            return redirect()->back()->with('status', 'Incorrect token.');
        }
    }

    public function logout()
    {
        $user = Auth::user();
        $user->verified = 0;
        $user->save();
        Auth::logout();
        return redirect('/login');
    }
}
