<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Pagament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showResetForm(Request $request, $token = null)
    {
        $arrayPagaments = Pagament::all();
        return view('auth.passwords.reset', array('pagaments'=>$arrayPagaments))->with(
            ['token' => $token, 'usuari' => $request->usuari]
        );
    }
    protected function rules()
    {
        return [
            'token' => 'required',
            'usuari' => 'required|string|max:50',
            'password' => 'required|confirmed|min:6',
        ];
    }
    protected function resetPassword($user, $password)
    {
        $user->contrasenya = Hash::make($password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        $this->guard()->login($user);
    }
    protected function credentials(Request $request)
    {
        return $request->only(
            'usuari', 'password', 'password_confirmation', 'token'
        );
    }
}
