<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use App\Models\User;

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

    }

    public function authenticate(Request $request)
    {
        if( $request->input('username') != 'ahzam' )
        {
            return response()->json(
                [
                    'message' => 'User Name Incorrect',
                    'status' => 0,
                ]
            );
        }

        if( $request->input('password') != 'certainly' )
        {
            return response()->json(
                [
                    'message' => 'Password Incorrect',
                    'status' => 0,
                ]
            );
        }

        // $request->session()->put('name', 'ahzam');
        // $rand = 500;

        // $request->session()->put('token_cust', $rand);

        // return response('Authenticated')->cookie(
        //     'token_cust', $rand, 30
        // );

        session_start();

        $_SESSION['token'] = '500';
        $_SESSION['name'] = $request->input('username');

        setcookie('token', '500');

        return response('Authenticated');
    }

}

?>