<?php

namespace App\Http\Controllers\jotno_shop;

use App\color;
use App\Http\Controllers\Controller;
use App\size;
use App\weight;
use Illuminate\Http\Request;
use App\product;
use App\productColor;
use App\productRelatedImage;
use App\productSize;
use App\productWeight;
use App\category;
use Cart;

class AddToCartController extends Controller
{
    public function insert(Request $request)
    {
        $this->validate($request,[
            'size_id' => 'required',
            'color_id' => 'required',
            'weight_id' => 'required'
        ]);
        $product        = product::where('id',$request->id)->first();
        $productSize    = size::where('id',$request->size_id)->first();
        $productColor   = color::where('id',$request->color_id)->first();
        $productWeight  = weight::where('id',$request->weight_id)->first();
        Cart::add
        ([
            'id'         => $product->id,
            'name'       => $product->name,
            'price'      => (!empty($product->disc_price))?$product->disc_price:$product->price,
            'qty'        => $request->qty,
            'weight'     => 0, // bumbummen99shopping cart required field

            'options'    =>
                            [
                                'size_id'       =>  $request->size_id,
                                'size_name'     =>  $productSize->name,

                                'color_id'      =>  $request->color_id,
                                'color_name'    =>  $productColor->name,

                                'weight_id'     =>  $request->weight_id,
                                'weight_name'   =>  $productWeight->name,

                                'image'         =>  $product->image,
                            ]

        ]);

        $notification = array
        (
            'message' => 'Product Added successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('view.cart')->with($notification);
    }

    public function view()
    {
        $data['title'] ='Shopping Cart Page';
        $data['categories'] = product::select('category_id')->groupBy('category_id')->orderBy('id','desc')->get();
        return view('jotno.jotno_shop.shop_pages.shoppingCart',$data);
    }

    public function update(Request $request)
    {
        Cart::update($request->rowId,$request->qty);

        $notification = array
        (
            'message' => 'Quantity Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.cart')->with($notification);
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);

        $notification = array
        (
            'message' => 'Product Deleted successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('view.cart')->with($notification);
    }

}
