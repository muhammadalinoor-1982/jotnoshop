<?php

namespace App\Http\Controllers\jotno_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\order;
use App\order_detail;
use App\payment;
use App\shipping;

class orderController extends Controller
{
    public function pending()
    {
        $data['title'] ='Pending Order List';
        $data['serial'] = 1;
        $data['orders'] = order::where('status', 'pending')->get();
        return view('jotno.jotno_admin.admin_pages.Order.pendingOrder_list',$data);

    }

    public function approved()
    {
        $data['title'] ='Approved Order List';
        $data['serial'] = 1;
        $data['orders'] = order::where('status', 'approved')->get();
        return view('jotno.jotno_admin.admin_pages.Order.approvedOrder_list',$data);

    }

    public function details($id)
    {
        $data['title'] ='Order Details';
        $data['order'] = order::find($id);
        return view('jotno.jotno_admin.admin_pages.Order.orderDetails',$data);

    }
}
