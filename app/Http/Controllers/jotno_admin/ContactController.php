<?php

namespace App\Http\Controllers\jotno_admin;

use App\contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function view()
    {
        $data['title']='Contact List';
        $data['contacts'] = contact::orderBy('id','desc')->get();
        $data['serial'] = 1;
        return  view('jotno.jotno_admin.admin_pages.Contact.contact_list',$data);
    }

    public function create()
    {
        $data['title']='Add New';
        $data['contacts'] = contact::all();
        return view('jotno.jotno_admin.admin_pages.Contact.Add_&_Edit_contact',$data);
    }

    public function store(Request $request)
    {

        $data = new contact();
        $data->creator               = auth()->user()->name;
        $data->about                 = $request->about;
        $data->location              = $request->location;
        $data->phone                 = $request->phone;
        $data->alt_phone             = $request->alt_phone;
        $data->email                 = $request->email;
        $data->link_1                = $request->link_1;
        $data->link_2                = $request->link_2;
        $data->link_3                = $request->link_3;
        $data->link_4                = $request->link_4;
        $data->link_5                = $request->link_5;

        $data->save();

        $notification = array
        (
            'message' => 'Contact Created successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('contact.view')->with($notification);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Contact';
        $data['editData'] = contact::findOrFail($id);
        return  view('jotno.jotno_admin.admin_pages.Contact.Add_&_Edit_contact',$data);
    }

    public function update(Request $request, $id)
    {

        $data = contact::find($id);
        $data->updater              = auth()->user()->name;
        $data->about                 = $request->about;
        $data->location              = $request->location;
        $data->phone                 = $request->phone;
        $data->alt_phone             = $request->alt_phone;
        $data->email                 = $request->email;
        $data->link_1                = $request->link_1;
        $data->link_2                = $request->link_2;
        $data->link_3                = $request->link_3;
        $data->link_4                = $request->link_4;
        $data->link_5                = $request->link_5;

        $data->save();

        $notification = array
        (
            'message' => 'Contact updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('contact.view')->with($notification);
    }

    public function delete($id)
    {
        $contact = contact::findOrFail($id);

        $contact->delete();

        $notification = array
        (
            'message' => 'Contact Info has been deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('contact.view')->with($notification);
    }

    public function details($id)
    {
        $contact['title'] = 'Contact Details';
        $contact['contact'] = contact::findOrFail($id);
        return view('jotno.jotno_admin.admin_pages.Contact.details',$contact);
    }

}
