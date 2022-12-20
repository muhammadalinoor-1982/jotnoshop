<?php

namespace App\Http\Controllers\jotno_admin;

use App\brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\brandRequest;
use Illuminate\Http\Request;

class brandController extends Controller
{
    public function view()
    {
        $data['title'] = 'Brand List';
        $data['brands'] = brand::orderBy('id','desc')->get();
        $data['serial'] = 1;
        return  view('jotno.jotno_admin.admin_pages.Brand.brand_list',$data);
    }

    public function create()
    {
        $data['title']='Add New';
        $data['brands'] = brand::all();
        return view('jotno.jotno_admin.admin_pages.Brand.Add_&_Edit_brand',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:brands,name',
            'status' => 'required'
        ]);

        $data = new brand();
        $data->creator              = auth()->user()->name;
        $data->name                 = $request->name;
        $data->status               = $request->status;

        if ($request->file('image'))
        {
            $file = $request->file('image');
            $file_name = date('d.m.Y') . '_' . time() . '_' . rand(0000, 9999) . '_' . 'JOTNO_BRAND_' . $file->getClientOriginalName();
            $file->move(public_path('jotno_admin/assets/images/brand_logo/'), $file_name);
            $data['image'] = $file_name;
        }

        $data->save();

        $notification = array
        (
            'message' => 'Brand Created successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('brand.view')->with($notification);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Brand';
        $data['editData'] = brand::findOrFail($id);
        return  view('jotno.jotno_admin.admin_pages.Brand.Add_&_Edit_brand',$data);
    }

    public function update(brandRequest $request, $id)
    {

        $data = brand::find($id);
        $data->updater              = auth()->user()->name;
        $data->name                 = $request->name;
        $data->status               = $request->status;

        if($request->file('image'))
        {
            $file = $request->file('image');
            @unlink(public_path('jotno_admin/assets/images/brand_logo/'.$data->image));
            $file_name = date('d.m.Y').'_'.time().'_'.rand(0000,9999).'_'.'JOTNO_BRAND_'.$file->getClientOriginalName();
            $file->move(public_path('jotno_admin/assets/images/brand_logo/'),$file_name);
            $data['image'] = $file_name;
        }

        $data->save();

        $notification = array
        (
            'message' => 'Brand updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('brand.view')->with($notification);
    }

    public function delete($id)
    {
        $brand = brand::findOrFail($id);

        if(file_exists('public/jotno_admin/assets/images/brand_logo/'.$brand->image) AND !empty($brand->image))
        {
            unlink('public/jotno_admin/assets/images/brand_logo/'.$brand->image);
        }

        $brand->delete();

        $notification = array
        (
            'message' => 'Brand Info has been deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('brand.view')->with($notification);
    }
}
