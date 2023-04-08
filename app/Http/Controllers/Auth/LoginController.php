<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// use App\Services\PrettyPrinter;
use App\Facades\PrettyPrintFacade as PrettyPrint;

use App\Facades\CelestialObjectsDataFacade;

use Illuminate\Http\Request;

use App\Models\User;
//use function App\pretty_print_and_die;

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
        if( empty(session('token')) || empty($request->cookie('token')) )
        {
            return view('login_form',[
                'asset_id' => null,
                'page_title' => 'Login',
                'main_heading' => 'Login',
                'form_action' => '/login/authenticate'
            ]);
        }

        return redirect('/resources');
    }

    public function authenticate(Request $request)
    {
        $user = User::where('name', $request->input('name'))
        ->get()
        ->toArray();

        //PrettyPrint::print_and_die(['car' => 'camaro']);
        //PrettyPrint::print_and_die( $obj );

        //pretty_print_and_die(['car' => 'camaro']);

        //echo get_mass_of_sun();
        //echo CelestialObjectsDataFacade::get_mass_of_sun();
        // echo get_mass_of_moon();
        // exit;

        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required']
        ]);

        // if( Auth::attempt($credentials))
        // {
        //     return response()
        //     ->json([
        //         'status' => 'false',
        //         'message' => 'Data Incomplete'
        //     ],400);
        // }

        if( empty($user) )
        {
            return response()->json(
                [
                    'message' => 'User Name Incorrect',
                    'status' => 0,
                ],
                404
            );
        }

        if( !Hash::check( $request->input('password'), $user[0]['password'] ) )
        {
            return response()->json(
                [
                    'message' => 'Password Incorrect',
                    'status' => 0,
                ],
                401
            );
        }

        $request->session()->put([
            'token' => 500
        ]);

        return response()
        ->json([
            'status' => 'true',
            'redirect_url' => '/',
            'message' => 'Login Successful'
        ],200)
        ->cookie('token', 500);

        // return response('')
        // ->cookie('token', 500);

        //return redirect('/');

        // return response('Logged In')
        // ->cookie('token', 500);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }

}

?>