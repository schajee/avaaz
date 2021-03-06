<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use Validator;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function index(Request $request)
    {
        // $request->session()->put('return', $request->header('referer'));
        return view('auth.login');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function store(Request $request)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => bcrypt($data['password']),
        // ]);
    }

    public function update(Request $request)
    {
        $field = filter_var($request->identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $this->validate($request, [
            'identity'  => 'required|exists:users,'.$field.',active,1',
            'password'  => 'required',
        ]);

        if (Auth::attempt([$field => $request->identity, 'password' => $request->password, 'active' => 1], true))
        {
            return redirect()->intended('/');
        }

        $request->session()->flash('status', 'Invalid email/phone or password');
        return back();
    }

    /**
     * Sends request to the relevant provider
     * 
     * @param   string      $provider
     * @return  redirect 
     */
    public function login(Request $request, $provider)
    {
        // Place originating url in session
        $request->session()->put('return', $request->header('referer'));

        // Initiate authentication request
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Processes response from provider
     * 
     * @param   string      $provider
     * @return  redirect
     */
    public function socialize(Request $request, $provider)
    {
        // Fetch the authorized user object
        $user = Socialite::driver($provider)->user();

        // Fetch the saved user or create a new user 
        $authUser = User::firstOrCreate([
            'name'  => $user->name,
            'email' => $user->email,
        ]);  

        // Attempt login and return back
        Auth::login($authUser, true); 
        return redirect()->to($request->session()->get('return')); 
    }

    /**
     * Logs out the user; returns to home or back
     */
    public function forgot(Request $request)
    {
        // Auth::logout();
        // $request->session()->flush();
        // return redirect('/');
    }

    /**
     * Logs out the user; returns to home or back
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->intended('/');
    }

    public function password (Request $request, string $pwd)
    {
        return bcrypt($pwd);
    }
}
