<?php

namespace App\Http\Controllers\Auth;
use Auth;
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
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout']]);
    }
    use AuthenticatesUsers {
       logout as performLogout;
    }
    public function logout(Request $request)
    {
       $this->performLogout($request);
       return redirect()->route('login');
    }
    public function login(Request $request)
    {
       // dd($request->all());
       if (Auth::attempt([

               'email' => $request ->email,
               'password' => $request->password,

           ])) {
           
           $user = User::where('email',$request->email)->first();

           if ($user->admin()) {
               
               return redirect()->route('admin_dashboard');
           }
           elseif ($user->bigstock()  && $user->stocker() ) {
               
               return redirect()->route('bigstock_dashboard');
           }
           elseif ($user->smallstock() && $user->stocker() ) {
               
               return redirect()->route('smallstock_dashboard');
           }
           elseif ($user->salestock() && $user->seller() ) {

               return redirect()->route('salestock_dashboard');
          }
          return redirect()->back();
       }
       
    }
}
