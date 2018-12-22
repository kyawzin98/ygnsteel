<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

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

    public function showLoginForm()
    {
        return view('login');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function redirectToProviderTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleProviderCallback()
    {
        try {
            $socialUser = Socialite::driver('facebook')->user();
        }
        catch (Exception $e) {
            return redirect ('/');
        }

        $user=User::firstOrCreate(
            ['email' => $socialUser->getEmail()],
            ['name' => $socialUser->getName(), 'password' => bcrypt(1234)]
        );

        auth()->login($user);
        return redirect('/home');

    }

    public function handleProviderCallbackTwitter()
    {
        try {
            $socialUser = Socialite::driver('twitter')->user();
        }
        catch (Exception $e) {
            return redirect ('/');
        }

        $user=User::firstOrCreate(
            ['email' => $socialUser->getEmail()],
            ['name' => $socialUser->getName(), 'password' => bcrypt(1234)]
        );

        auth()->login($user);
        return redirect('/home');

    }

    public function handleProviderCallbackGoogle()
    {
        try {
            $socialUser = Socialite::driver('google')->stateless()->user();
        }
        catch (Exception $e) {
            return redirect ('/');
        }

        $user=User::firstOrCreate(
            ['email' => $socialUser->getEmail()],
            ['name' => $socialUser->getName(), 'password' => bcrypt(1234)]
        );

        auth()->login($user);
        return redirect('/home');

    }
}
