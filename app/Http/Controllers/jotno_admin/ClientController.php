<?php

namespace App\Http\Controllers\jotno_admin;

use App\client;
use App\Http\Controllers\Controller;
use App\Http\Requests\clientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function view()
    {
        $data['title']='Client List';
        $data['clients'] = client::orderBy('id','desc')->get();
        $data['serial'] = 1;
        return  view('jotno.jotno_admin.admin_pages.Client.client_list',$data);
    }

    public function create()
    {
        $data['title']='Add New';
        $data['clients'] = client::all();
        return view('jotno.jotno_admin.admin_pages.Client.Add_&_Edit_client',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:clients,name',
        ]);

        $data = new client();
        $data->creator               = auth()->user()->name;
        $data->name                 = $request->name;
        $data->status                = $request->status;

        if ($request->file('image'))
        {
            $file = $request->file('image');
            $file_name = date('d.m.Y') . '_' . time() . '_' . rand(0000, 9999) . '_' . 'JOTNO_CLIENT_' . $file->getClientOriginalName();
            $file->move(public_path('jotno_admin/assets/images/client/'), $file_name);
            $data['image'] = $file_name;
        }

        $data->save();

        $notification = array
        (
            'message' => 'Client Created successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('client.view')->with($notification);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit client';
        $data['editData'] = client::findOrFail($id);
        return  view('jotno.jotno_admin.admin_pages.Client.Add_&_Edit_client',$data);
    }

    public function update(clientRequest $request, $id)
    {

        $data = client::find($id);
        $data->updater              = auth()->user()->name;
        $data->name                 = $request->name;
        $data->status              = $request->status;

        if($request->file('image'))
        {
            $file = $request->file('image');
            @unlink(public_path('jotno_admin/assets/images/client/'.$data->image));
            $file_name = date('d.m.Y').'_'.time().'_'.rand(0000,9999).'_'.'JOTNO_CLIENT_'.$file->getClientOriginalName();
            $file->move(public_path('jotno_admin/assets/images/client/'),$file_name);
            $data['image'] = $file_name;
        }

        $data->save();

        $notification = array
        (
            'message' => 'Client updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('client.view')->with($notification);
    }

    public function delete($id)
    {
        $client = client::findOrFail($id);

        if(file_exists('public/jotno_admin/assets/images/client/'.$client->image) AND !empty($client->image))
        {
            unlink('public/jotno_admin/assets/images/client/'.$client->image);
        }

        $client->delete();

        $notification = array
        (
            'message' => 'Client Info has been deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('client.view')->with($notification);
    }

}
