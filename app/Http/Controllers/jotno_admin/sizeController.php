<?php

namespace App\Http\Controllers\jotno_admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\sizeRequest;
use App\size;
use Illuminate\Http\Request;

class sizeController extends Controller
{
    public function view()
    {
        $data['title'] = 'Size List';
        $data['sizes'] = size::orderBy('id','desc')->get();
        $data['serial'] = 1;
        return  view('jotno.jotno_admin.admin_pages.Size.size_list',$data);
    }

    public function create()
    {
        $data['title']='Add New';
        $data['sizes'] = size::all();
        return view('jotno.jotno_admin.admin_pages.Size.Add_&_Edit_size',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:sizes,name',
            'status' => 'required'
        ]);

        $data = new size();
        $data->creator              = auth()->user()->name;
        $data->name                 = $request->name;
        $data->status               = $request->status;
        $data->save();

        $notification = array
        (
            'message' => 'Size Created successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('size.view')->with($notification);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Size';
        $data['editData'] = size::findOrFail($id);
        return  view('jotno.jotno_admin.admin_pages.Size.Add_&_Edit_size',$data);
    }

    public function update(sizeRequest $request, $id)
    {

        $data = size::find($id);
        $data->updater              = auth()->user()->name;
        $data->name                 = $request->name;
        $data->status               = $request->status;
        $data->save();

        $notification = array
        (
            'message' => 'Size updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('size.view')->with($notification);
    }

    public function delete($id)
    {
        $size = size::findOrFail($id);
        $size->delete();

        $notification = array
        (
            'message' => 'Size Info has been deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('size.view')->with($notification);
    }
}
