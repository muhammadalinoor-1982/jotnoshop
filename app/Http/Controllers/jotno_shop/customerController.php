<?php

namespace App\Http\Controllers\jotno_shop;

use App\Http\Controllers\Controller;
use App\mainCarousel;
use App\product;
use Illuminate\Http\Request;

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
        $data['title'] ='Jotno Shop';
        $data['main_carousels'] = mainCarousel::all();
        $data['products'] = product::where('category_id',$category_id)->orderBy('id','desc')->get();
        $data['categories'] = product::select('category_id')->groupBy('category_id')->orderBy('id','desc')->get();
        return view('jotno.jotno_shop.shop_pages.cat_product',$data);
    }

    public function jotnoshop()
    {
        $data['title'] ='Jotno Shop';
        $data['main_carousels'] = mainCarousel::all();
        $data['products'] = product::orderBy('id','desc')->get();
        $data['categories'] = product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = product::select('brand_id')->groupBy('brand_id')->get();
        return view('jotno.jotno_shop.shop_pages.jotnoshop',$data);
    }

    public function login()
    {
        $data['title'] ='Login';
        return view('jotno.jotno_shop.shop_pages.login_jotno',$data);
    }
}
