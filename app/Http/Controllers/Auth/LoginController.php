<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\ApplicantAccount;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;

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
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        
    }

    public function adminLogin(Request $request){

        auth()->logout();
        
        $input = $request->all();
        
        $validator = $request->validate( [
            'id_number' => 'required',
            'password' => 'required',
        ]);
        // dd(Auth::guard('admin')->attempt($validator));
        if(Auth::guard('admin')->attempt($validator))
        {  
            if (Auth::guard('admin')->user()->is_admin == 1) {  
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('admin.dashboard');
            }
        }else{
            $request->session()->regenerate();
            return redirect()->route('admin.login-page')
                ->withErrors(['id_number' => 'Invalid Credentials']);
        } 
    }

    protected function guard()
    {
    return Auth::guard('admin');
    }

    public function logout () {
     
        auth()->logout();
    
        return redirect('/');
    }

    public function applicantLogin(Request $request){

        $validator = $request->validate([
                'email' => ['required', 'email'],
                'password' => 'required'
            ]);

        if(auth()->attempt($validator)){
                $request->session()->regenerate();
    
                return Redirect::back()->with('message', 'You are now logged in!');
            }

        return Redirect::back()->withErrors(['email' => 'Invalid Credentials'], 'loginErrors')->onlyInput('email');
        
    }
}
