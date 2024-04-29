<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\AuthDataMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\LaravelTenTestMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Messages\MailMessage;
use Dsoloview\YandexCaptcha\Rules\YandexCaptcha; 
class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except(
            [
                'logout',
                'dashboard'
            ]
        );
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('welcome');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'email' => 'required|email|max:250|unique:users',
                'password' => 'required|confirmed',
                'smart-token' => ['required', new YandexCaptcha] , 
            ]
        );

        $user = User::create(
            [
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'traffic' => 'Premium+' // $request->traffic
            ]
        );

        $user->sendEmailVerificationNotification();


        Mail::to($request->email)->send(
            new AuthDataMail([$request->email, $request->password])
        );
        // $data = "Чемпион";

        

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('progress')
                ->withSuccess('Успешно!');
        }

        return back()->withErrors(
            [
                'email' => "Неверное имя пользователя или пароль."
            ]
        )->onlyInput('email');
       

    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('welcome');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
               
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('progress')
                ->withSuccess('Успешно!');
        }

        return back()->withErrors(
            [
                'email' => "Неверное имя пользователя или пароль."
            ]
        )->onlyInput('email');
    }

    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if (Auth::check()) {
            return view('auth.dashboard');
        }

        return redirect()->route('login')
            ->withErrors(
                [
                    'email' => 'Please login to access the dashboard.',
                ]
            )->onlyInput('email');
    }

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->withErrors(
            [
                'email' => "Успешно"
            ]
        )->onlyInput('email');
    }

}
