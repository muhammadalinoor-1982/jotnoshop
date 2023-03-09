<?php

namespace App\Http\Controllers\jotno_shop;

use App\category;
use App\Http\Controllers\Controller;
use App\mainCarousel;
use App\order;
use App\order_detail;
use App\payment;
use App\product;
use App\productColor;
use App\productRelatedImage;
use App\productSize;
use App\productWeight;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Cart;

class customerController extends Controller
{
    public function customer()
    {
        $data['title'] ='Jotno Shop';
        $data['main_carousels'] = mainCarousel::all();
        $data['categories'] = product::select('category_id')->groupBy('category_id')->orderBy('id','desc')->get();
        return view('jotno.jotno_shop.shop_pages.customerDashboard',$data);
    }

    public function cat_product($category_id)
    {
        $data['title'] = 'Category Wise Product';
        $data['main_carousels'] = MainCarousel::all();
        $data['category'] = category::where('name',$category_id)->first();
        $data['products'] = Product::where('category_id',$category_id)->orderBy('id','desc')->get();
        return view('jotno.jotno_shop.shop_pages.cat_product',$data);
    }

    public function productDtails($slug)
    {
        $data['title'] ='Product Details';
        $data['productDetails'] = product::where('slug',$slug)->first();
        $data['categories'] = product::select('category_id')->groupBy('category_id')->orderBy('id','desc')->get();
        $data['relatedImage'] = productRelatedImage::where('product_id',$data['productDetails']->id)->get();
        $data['productSize'] = productSize::where('product_id',$data['productDetails']->id)->get();
        $data['productColor'] = productColor::where('product_id',$data['productDetails']->id)->get();
        $data['productWeight'] = productWeight::where('product_id',$data['productDetails']->id)->get();
        return view('jotno.jotno_shop.shop_pages.productDetails',$data);
    }

    public function jotnoshop()
    {
        $data['title'] ='Jotno Shop';
        $data['main_carousels'] = mainCarousel::all();
        $data['categories'] = product::select('category_id')->groupBy('category_id')->orderBy('id','desc')->get();
        //$data['products'] = product::orderBy('id','desc')->get();
        //$data['categories'] = product::select('category_id')->groupBy('category_id')->get();
        //$data['brands'] = product::select('brand_id')->groupBy('brand_id')->get();
        return view('jotno.jotno_shop.shop_pages.jotnoshop',$data);
    }

    public function login()
    {
        $data['title'] ='Login';
        return view('jotno.jotno_shop.shop_pages.login_jotno',$data);
    }

    public function payment()
    {
        $data['title'] ='Payment';
        $data['categories'] = product::select('category_id')->groupBy('category_id')->orderBy('id','desc')->get();
        return view('jotno.jotno_shop.shop_pages.payment',$data);
    }

    public function store(Request $request)
    {
        if ($request->product_id == NULL)
        {
            $notification = array
            (
                'message' => 'Please Cart your Product',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else
            {
                $this->validate($request,[
                    'payment_method' => 'required',
                    'shipping_type' => 'required',
                ]);
                if($request->payment_method == 'Bkash' && $request->transaction_id == NULL)
                {
                    $notification = array
                    (
                        'message' => 'Please Enter your Bkash Transaction ID',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
                DB::transaction(function() use($request){
                    $payment = new payment();
                    $payment->payment_method = $request->payment_method;
                    $payment->transaction_id = $request->transaction_id;
                    $payment->shipping_type = $request->shipping_type;
                    $payment->save();

                    $order = new order();
                    $order->user_id = Auth::user()->id;
                    $order->shipping_id = Session::get('shipping_id');
                    $order->payment_id = $payment->id;

                    $order_data = order::orderBy('id','desc')->first();
                    if ($order_data == null){
                        $firstReg = 0;
                        $order_no = $firstReg + 1;
                    }else{
                        $order_data = order::orderBy('id','desc')->first()->order_no;
                        $order_no = $order_data + 1;
                    }
                    $order->order_no = $order_no;

                    $order->order_total = $request->order_total;
                    $order->status = 'pending';
                    $order->save();

                    $contents =  Cart::content();
                    if($contents == null){
                        $notification = array
                        (
                            'message' => 'Sorry..!! There is no Product',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->with($notification);
                    }else{
                        foreach ($contents as $content){
                            $order_details = new order_detail();
                            $order_details->order_id = $order->id;
                            $order_details->product_id = $content->id;
                            $order_details->color_id = $content->options->color_id;
                            $order_details->size_id = $content->options->size_id;
                            $order_details->weight_id = $content->options->weight_id;
                            $order_details->quantity = $content->qty;
                            $order_details->save();
                        }
                    }
                });
        }

        Cart::destroy();
        $notification = array
        (
            'message' => 'Your Order saved successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('jotnoshop.orderList')->with($notification);
    }

    public function orderList(){
        $data['title'] ='Order List';
        $data['orders'] =order::where('user_id', Auth::user()->id)->orderBy('id','desc')->get();
        $data['categories'] = product::select('category_id')->groupBy('category_id')->orderBy('id','desc')->get();
        $data['serial'] = 1;
        return view('jotno.jotno_shop.shop_pages.orderList',$data);
    }

    public function orderDetails($id){
        $orderData = order::find($id);
        $data['order'] =order::where('id', $orderData->id)->where('user_id', Auth::user()->id)->first();
        if ($data['order'] == false)
        {

            $notification = array
            (
                'message' => 'Do not try to be over smart...!!!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        else
            {
        $data['title'] ='Order Details';
        $data['order'] =order::with(['orderDetails'])->where('id', $orderData->id)->where('user_id', Auth::user()->id)->first();
        $data['categories'] = product::select('category_id')->groupBy('category_id')->orderBy('id','desc')->get();
        return view('jotno.jotno_shop.shop_pages.orderDetails',$data);
        }

    }

    public function searchProduct(Request $request)
    {
        $slug = $request->slug;
        $data['productDetails'] = product::where('slug',$slug)->first();
        if($data['productDetails'])
        {
            $data['title'] ='Product Details';
            $data['productDetails'] = product::where('slug',$slug)->first();
            $data['categories'] = product::select('category_id')->groupBy('category_id')->orderBy('id','desc')->get();
            $data['relatedImage'] = productRelatedImage::where('product_id',$data['productDetails']->id)->get();
            $data['productSize'] = productSize::where('product_id',$data['productDetails']->id)->get();
            $data['productColor'] = productColor::where('product_id',$data['productDetails']->id)->get();
            $data['productWeight'] = productWeight::where('product_id',$data['productDetails']->id)->get();
            return view('jotno.jotno_shop.shop_pages.searchProduct',$data);
        }
        else
        {
            $notification = array
            (
                'message' => 'Sorry..!! No Product Found',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function getProduct(Request $request)
    {
        $slug = $request->slug;
        $productData = DB::table('products')->where('slug', 'LIKE', '%'.$slug.'%')->get();
        $html = '';
        $html .= '<div><ul>';
        if($productData)
        {
            foreach ($productData as $v)
            {
                $html .= '<li><strong>'.$v->slug.'</strong></li>';
            }
        }
        $html .= '</ul></div>';
        return response()->json($html);
    }
}
