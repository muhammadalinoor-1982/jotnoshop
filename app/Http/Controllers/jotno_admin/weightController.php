<?php

namespace App\Http\Controllers\jotno_admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\weightRequest;
use App\weight;
use Illuminate\Http\Request;

class weightController extends Controller
{
    public function view()
    {
        $data['title'] = 'Weight List';
        $data['weights'] = weight::orderBy('id','desc')->get();
        $data['serial'] = 1;
        return  view('jotno.jotno_admin.admin_pages.Weight.weight_list',$data);
    }

    public function create()
    {
        $data['title']='Add New';
        $data['weights'] = weight::all();
        return view('jotno.jotno_admin.admin_pages.Weight.Add_&_Edit_weight',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:weights,name',
            'status' => 'required'
        ]);

        $data = new weight();
        $data->creator              = auth()->user()->name;
        $data->name                 = $request->name;
        $data->status               = $request->status;
        $data->save();

        $notification = array
        (
            'message' => 'Size Created successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('weight.view')->with($notification);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Weight';
        $data['editData'] = weight::findOrFail($id);
        return  view('jotno.jotno_admin.admin_pages.Weight.Add_&_Edit_weight',$data);
    }

    public function update(weightRequest $request, $id)
    {

        $data = weight::find($id);
        $data->updater              = auth()->user()->name;
        $data->name                 = $request->name;
        $data->status               = $request->status;
        $data->save();

        $notification = array
        (
            'message' => 'Weight updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('weight.view')->with($notification);
    }

    public function delete($id)
    {
        $weight = weight::findOrFail($id);
        $weight->delete();

        $notification = array
        (
            'message' => 'Weight Info has been deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('weight.view')->with($notification);
    }
}
