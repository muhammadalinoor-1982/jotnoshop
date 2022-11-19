<?php

namespace App\Http\Controllers\jotno_shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class customerController extends Controller
{
    public function custom()
    {
        $data['title'] ='Jotno Shop';
        return view('jotno.jotno_shop.shop_pages.customerDashboard',$data);
    }
}
