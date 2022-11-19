<?php

namespace App\Http\Controllers\jotno_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function main()
    {
        $data['title'] ='Jotno Admin';
        return view('jotno.jotno_admin.admin_pages.adminDashboard',$data);
    }
}
