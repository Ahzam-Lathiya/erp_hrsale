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
        if(empty(session('token')))
        {
            return view('login_form',[
                'asset_id' => null,
                'page_title' => 'Login',
                'main_heading' => 'Login',
                'form_action' => '/login/authenticate'
            ]);
        }

        return response('Home View When logged in');
    }

    public function authenticate(Request $request)
    {
        $data = [
            'asset_id' => null,
            'page_title' => 'Login',
            'main_heading' => 'Login',
            'form_action' => '/login/authenticate'
        ];

        if( $request->input('username') != 'ahzam' )
        {
            // return response()->json(
            //     [
            //         'message' => 'User Name Incorrect',
            //         'status' => 0,
            //     ]
            // );

            return response()
            ->view('login_form', $data, 404);
        }

        if( $request->input('password') != 'certainly' )
        {
            // return response()->json(
            //     [
            //         'message' => 'Password Incorrect',
            //         'status' => 0,
            //     ]
            // );
            return response()
            ->view('login_form', $data, 401);
        }

        $request->session()->put([
            'token' => 500
        ]);

        // return response()->json([
        //     'msg' => 'Login Successfully. Please Wait',
        //     'status' => 'TRUE'
        // ]);

        return response('Logged In')
        ->cookie('token', 500);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }

}

?>