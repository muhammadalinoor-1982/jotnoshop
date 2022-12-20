<?php

namespace App\Http\Controllers\jotno_admin;

use App\category;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function view()
    {
        $data['title'] = 'Category List';
        $data['categories'] = category::orderBy('id','desc')->get();
        $data['serial'] = 1;
        return  view('jotno.jotno_admin.admin_pages.Category.category_list',$data);
    }
}
