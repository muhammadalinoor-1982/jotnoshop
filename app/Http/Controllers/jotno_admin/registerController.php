<?php

namespace App\Http\Controllers\jotno_admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class registerController extends Controller
{
    public function view()
    {
        $data['title']='User Registration';
        return view('jotno.jotno_shop.shop_pages.register_jotno',$data);
    }

    public function store(Request $request)
    {
        DB::transaction(function () use($request)
        {
            //************************************************ start Validation ***************************
            $this->validate($request,[
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'mobile' => 'required',
                'password' => 'min:3|required_with:password_confirmation|same:password_confirmation','password_confirmation' => 'min:3'
            ]);

            //************************************************ End Validation *****************************
            //************************************************ start user data save into DB ***************
            $verification_code = rand(000000,999999);
            $user = new User();
            $user -> name = $request -> name;
            $user -> email = $request -> email;
            $user -> mobile = $request -> mobile;
            $user -> password = bcrypt($request -> password);
            $user -> verification_code = $verification_code;
            $user -> status = 'inactive';
            $user -> role = 'customer';
            $user -> save();
            //************************************************ End user data save into DB *****************
            //************************************************ start Email sent ***************************
            $data = array
            (
                'email' => $request->email,
                'verification_code' => $verification_code
            );

            Mail::send('jotno.jotno_shop.shop_pages.SentEmailVerificationCode', $data, function ($message) use($data)
            {
                $message -> from('noreply@jotnoshop.com','Please verify your Jotnoshop Account');
                $message -> to($data ['email']);
                $message -> subject('Please verify your Jotnoshop Account');
            });
            //************************************************ End Email sent   ***************************
        });

        session()->flash('message','A Verification code has been send to your email address, please check your email and verify it..!!!');
        return redirect()->route('sent.email.verification.code');
    }

    public function sentemailverificationcode()
    {
        return view('jotno.jotno_shop.shop_pages.VerifyEmailCode'); //Note: This page configuration in the 4th Part of the note.
    }

    public function verifyemailcodestore(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'verification_code' => 'required',
        ]);

        $checkData = User::where('email', $request->email)->where('verification_code', $request->verification_code)->first();
        if($checkData)
        {
            $checkData->status = 'active';
            $checkData->save();

            session()->flash('message','Your account has been verified, please Login');
            return redirect()->route('login');
        }else{
            session()->flash('message','Your email or verification code is invalid');
            return redirect()->back();
        }
    }
}
