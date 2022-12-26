<?php

namespace App\Http\Controllers\jotno_admin;

use App\category;
use App\Http\Controllers\Controller;
use App\Http\Requests\categoryRequest;
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
    public function create()
    {
        $data['title']='Add New';
        $data['categories'] = category::all();
        return view('jotno.jotno_admin.admin_pages.Category.Add_&_Edit_category',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:categories,name',
            'status' => 'required'
        ]);

        $data = new category();
        $data->creator              = auth()->user()->name;
        $data->name                 = $request->name;
        $data->parent                 = $request->parent;
        $data->status               = $request->status;

        if ($request->file('image'))
        {
            $file = $request->file('image');
            $file_name = date('d.m.Y') . '_' . time() . '_' . rand(0000, 9999) . '_' . 'JOTNO_CATEGORY_' . $file->getClientOriginalName();
            $file->move(public_path('jotno_admin/assets/images/category/'), $file_name);
            $data['image'] = $file_name;
        }

        $data->save();

        $notification = array
        (
            'message' => 'Category Created successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('category.view')->with($notification);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Category';
        $data['editData'] = category::findOrFail($id);
        $data['categories'] = category::all();
        return  view('jotno.jotno_admin.admin_pages.Category.Add_&_Edit_category',$data);
    }

    public function update(categoryRequest $request, $id)
    {

        $data = category::find($id);
        $data->updater              = auth()->user()->name;
        $data->name                 = $request->name;
        $data->parent               = $request->parent;
        $data->status               = $request->status;

        if($request->file('image'))
        {
            $file = $request->file('image');
            @unlink(public_path('jotno_admin/assets/images/category/'.$data->image));
            $file_name = date('d.m.Y').'_'.time().'_'.rand(0000,9999).'_'.'JOTNO_CATEGORY_'.$file->getClientOriginalName();
            $file->move(public_path('jotno_admin/assets/images/category/'),$file_name);
            $data['image'] = $file_name;
        }

        $data->save();

        $notification = array
        (
            'message' => 'Category updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category.view')->with($notification);
    }

    public function delete($id)
    {
        $category = category::findOrFail($id);

        if(file_exists('public/jotno_admin/assets/images/category/'.$category->image) AND !empty($category->image))
        {
            unlink('public/jotno_admin/assets/images/category/'.$category->image);
        }

        $category->delete();

        $notification = array
        (
            'message' => 'Category Info has been deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('category.view')->with($notification);
    }
}
