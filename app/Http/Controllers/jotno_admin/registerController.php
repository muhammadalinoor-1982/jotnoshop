<?php

namespace App\Http\Controllers\jotno_admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\regRequest;
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
                'mobile' => 'required|unique:users,mobile',
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

        $notification = array
        (
            'message' => 'A Verification code has been send to your email address, please check your email and verify it..!!!',
            'alert-type' => 'info'
        );

        return redirect()->route('sent.email.verification.code')->with($notification);
    }

    public function sentemailverificationcode()
    {
        return view('jotno.jotno_shop.shop_pages.VerifyEmailCode');
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

            $notification = array
            (
                'message' => 'Your account has been verified, please Login',
                'alert-type' => 'info'
            );

            return redirect()->route('login')->with($notification);
        }else{
            $notification = array
            (
                'message' => 'Your email or verification code is invalid',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }

//************************************************ Admin part Start   ***************************

    public function customer_view()
    {
        $data['title']='Customer';
        $data['users']=User::wherein('role',['dealer', 'wholesaler', 'retailer', 'customer'])->orderBy('id','desc')->get();
        $data['serial']=1;
        return view('jotno.jotno_admin.admin_pages.Register.Reg_Customer',$data);
    }

    public function stuff_view()
    {
        $data['title']='Stuff';
        $data['users']=User::wherein('role',['super_admin', 'admin', 'manager','supervisor','operator'])->orderBy('id','desc')->get();
        $data['serial']=1;
        return view('jotno.jotno_admin.admin_pages.Register.Reg_Stuff',$data);
    }

    public function create()
    {
        $data['title']='Add New';
        $data['users'] = User::all();
        return view('jotno.jotno_admin.admin_pages.Register.Add_&_Edit_Reg',$data);
    }

    public function admin_store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'mobile' => 'required|unique:users,mobile',
            'status' => 'required',
            'password' => 'min:3|required_with:password_confirmation|same:password_confirmation','password_confirmation' => 'min:3'
        ]);

        $data = new User();
        $data->creator              = auth()->user()->name;
        $data->name                 = $request->name;
        $data->email                = $request->email;
        $data->mobile               = $request->mobile;
        $data->nationality          = $request->nationality;
        $data->country              = $request->country;
        $data->nid                  = $request->nid;
        $data->gender               = $request->gender;
        $data->role                 = $request->role;
        $data->status               = $request->status;
        $data->password             = bcrypt($request -> password);

        if ($request->file('image'))
        {
            $file = $request->file('image');
            $file_name = date('d.m.Y') . '_' . time() . '_' . rand(0000, 9999) . '_' . 'JOTNO_' . $file->getClientOriginalName();
            $file->move(public_path('jotno_admin/assets/images/user_images/'), $file_name);
            $data['image'] = $file_name;
        }

        $data->save();

        $notification = array
        (
            'message' => 'User Created successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('Register.customer.view')->with($notification);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit User';
        $data['editData'] = User::findOrFail($id);
        return  view('jotno.jotno_admin.admin_pages.Register.Add_&_Edit_Reg',$data);
    }

    public function update(regRequest $request, $id)
    {

        $data = User::find($id);
        $data->updater              = auth()->user()->name;
        $data->name                 = $request->name;
        $data->email                = $request->email;
        $data->mobile               = $request->mobile;
        $data->nationality          = $request->nationality;
        $data->country              = $request->country;
        $data->nid                  = $request->nid;
        $data->gender               = $request->gender;
        $data->role                 = $request->role;
        $data->status               = $request->status;

        if($request->file('image'))
        {
            $file = $request->file('image');
            @unlink(public_path('jotno_admin/assets/images/user_images/'.$data->image));
            $file_name = date('d.m.Y').'_'.time().'_'.rand(0000,9999).'_'.'JOTNO_'.$file->getClientOriginalName();
            $file->move(public_path('jotno_admin/assets/images/user_images/'),$file_name);
            $data['image'] = $file_name;
        }

        $data->save();

        $notification = array
        (
            'message' => 'User updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('Register.customer.view')->with($notification);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        if(file_exists('public/jotno_admin/assets/images/user_images/'.$user->image) AND !empty($user->image))
        {
            unlink('public/jotno_admin/assets/images/user_images/'.$user->image);
        }

        $user->delete();

        $notification = array
        (
            'message' => 'User Info has been deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('Register.customer.view')->with($notification);
    }

    public function customer_details($id)
    {
        $user['title'] = 'Customer Details';
        $user['editData'] = User::findOrFail($id);
        return view('jotno.jotno_admin.admin_pages.Register.Customer_Details',$user);
    }

    public function stuff_details($id)
    {
        $user['title'] = 'Stuff Details';
        $user['editData'] = User::findOrFail($id);
        return view('jotno.jotno_admin.admin_pages.Register.Stuff_Details',$user);
    }
}
