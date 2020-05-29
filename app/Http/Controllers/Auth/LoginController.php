<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Pagament;
use Illuminate\Http\Request;
use App\Auth;

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


    public function showLoginForm(){
        $arrayPagaments = Pagament::all();
        return view('auth.login', array('pagaments'=>$arrayPagaments));
    }
    //public function username(){
    //    return 'usuari';
    //}
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/administracio';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username(){
        return 'usuari';
    }
    
}
