<?php

namespace App\Http\Controllers\jotno_admin;

use App\color;
use App\Http\Controllers\Controller;
use App\Http\Requests\colorRequest;
use Illuminate\Http\Request;

class colorController extends Controller
{
    public function view()
    {
        $data['title'] = 'Color List';
        $data['colors'] = color::orderBy('id','desc')->get();
        $data['serial'] = 1;
        return  view('jotno.jotno_admin.admin_pages.Color.color_list',$data);
    }

    public function create()
    {
        $data['title']='Add New';
        $data['colors'] = color::all();
        return view('jotno.jotno_admin.admin_pages.Color.Add_&_Edit_color',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:colors,name',
            'status' => 'required'
        ]);

        $data = new color();
        $data->creator              = auth()->user()->name;
        $data->name                 = $request->name;
        $data->status               = $request->status;
        $data->save();

        $notification = array
        (
            'message' => 'Color Created successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('color.view')->with($notification);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Color';
        $data['editData'] = color::findOrFail($id);
        return  view('jotno.jotno_admin.admin_pages.Color.Add_&_Edit_color',$data);
    }

    public function update(colorRequest $request, $id)
    {

        $data = color::find($id);
        $data->updater              = auth()->user()->name;
        $data->name                 = $request->name;
        $data->status               = $request->status;
        $data->save();

        $notification = array
        (
            'message' => 'Color updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('color.view')->with($notification);
    }

    public function delete($id)
    {
        $color = color::findOrFail($id);
        $color->delete();

        $notification = array
        (
            'message' => 'Color Info has been deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('color.view')->with($notification);
    }
}
