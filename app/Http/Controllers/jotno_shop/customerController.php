<?php

namespace App\Http\Controllers\jotno_shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class customerController extends Controller
{
    public function customer()
    {
        $data['title'] ='Jotno Shop';
        return view('jotno.jotno_shop.shop_pages.customerDashboard',$data);
    }

    public function jotnoshop()
    {
        $data['title'] ='Jotno Shop';
        return view('jotno.jotno_shop.shop_pages.jotnoshop',$data);
    }

    public function login()
    {
        $data['title'] ='Login';
        return view('jotno.jotno_shop.shop_pages.login_jotno',$data);
    }
}
