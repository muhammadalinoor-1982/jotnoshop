<?php

namespace App\Http\Controllers\jotno_shop;

use App\color;
use App\Http\Controllers\Controller;
use App\shipping;
use App\size;
use App\weight;
use Illuminate\Http\Request;
use App\product;
use App\productColor;
use App\productRelatedImage;
use App\productSize;
use App\productWeight;
use App\category;
use App\User;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class checkOutController extends Controller
{
    public function checkOut()
    {
        $data['title'] ='Check Out Page';
        $data['categories'] = product::select('category_id')->groupBy('category_id')->orderBy('id','desc')->get();
        return view('jotno.jotno_shop.shop_pages.checkOut',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $checkout = new shipping();
        $checkout->user_id  = Auth::user()->id;
        $checkout->name     = $request->name;
        $checkout->phone    = $request->phone;
        $checkout->email    = $request->email;
        $checkout->address  = $request->address;

        $checkout->save();
        Session::put('shipping_id',$checkout->id);

        $notification = array
        (
            'message' => 'Data Save successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('jotno.shop.payment')->with($notification);
    }
}
