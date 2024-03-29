<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);
        $email = $request->email;
        $password = $request->password;

        $validData = User::where('email',$email)->first();
        $password_check = password_verify($password, @$validData->password);

        if($password_check == false)
        {
            $notification = array
            (
                'message' => 'invalid email or password',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
        if($validData->status == 'inactive')
        {
            $notification = array
            (
                'message' => 'You are not verified yet',
                'alert-type' => 'warning'
            );

            return redirect()->back()->with($notification);
        }
        if(Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return redirect()->route('login');
        }
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/main';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
