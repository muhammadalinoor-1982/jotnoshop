<?php

namespace App\Http\Controllers\jotno_admin;

use App\Http\Controllers\Controller;
use App\mainCarousel;
use Illuminate\Http\Request;

class mainCarouselController extends Controller
{
    public function view()
    {
        $data['title'] = 'Carousel List';
        $data['main_carousels'] = mainCarousel::orderBy('id','desc')->get();
        $data['serial'] = 1;
        return  view('jotno.jotno_admin.admin_pages.MainCarousel.mainCarousel_list',$data);
    }

    public function create()
    {
        $data['title']='Add New';
        $data['main_carousels'] = mainCarousel::all();
        return view('jotno.jotno_admin.admin_pages.MainCarousel.Add_&_Edit_mainCarousel',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:main_carousels,name',
        ]);

        $data = new mainCarousel();
        $data->creator              = auth()->user()->name;
        $data->name                 = $request->name;
        $data->tag                  = $request->tag;
        $data->heading              = $request->heading;
        $data->description          = $request->description;
        $data->link                 = $request->link;
        $data->event                = $request->event;
        $data->status               = $request->status;

        if ($request->file('image'))
        {
            $file = $request->file('image');
            $file_name = date('d.m.Y') . '_' . time() . '_' . rand(0000, 9999) . '_' . 'JOTNO_CAROUSEL_' . $file->getClientOriginalName();
            $file->move(public_path('jotno_admin/assets/images/mainCarousel/'), $file_name);
            $data['image'] = $file_name;
        }

        $data->save();

        $notification = array
        (
            'message' => 'Carousel Created successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('mainCarousel.view')->with($notification);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Carousel';
        $data['editData'] = mainCarousel::findOrFail($id);
        return  view('jotno.jotno_admin.admin_pages.MainCarousel.Add_&_Edit_mainCarousel',$data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>"required|name|unique:main_carousels,name,$id"
        ]);

        $data = mainCarousel::find($id);
        $data->updater              = auth()->user()->name;
        $data->name                 = $request->name;
        $data->tag                  = $request->tag;
        $data->heading              = $request->heading;
        $data->description          = $request->description;
        $data->link                 = $request->link;
        $data->event                = $request->event;
        $data->status               = $request->status;

        if($request->file('image'))
        {
            $file = $request->file('image');
            @unlink(public_path('jotno_admin/assets/images/mainCarousel/'.$data->image));
            $file_name = date('d.m.Y').'_'.time().'_'.rand(0000,9999).'_'.'JOTNO_CAROUSEL_'.$file->getClientOriginalName();
            $file->move(public_path('jotno_admin/assets/images/mainCarousel/'),$file_name);
            $data['image'] = $file_name;
        }

        $data->save();

        $notification = array
        (
            'message' => 'Carousel updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('mainCarousel.view')->with($notification);
    }

    public function delete($id)
    {
        $Carousel = mainCarousel::findOrFail($id);

        if(file_exists('public/jotno_admin/assets/images/mainCarousel/'.$Carousel->image) AND !empty($Carousel->image))
        {
            unlink('public/jotno_admin/assets/images/mainCarousel/'.$Carousel->image);
        }

        $Carousel->delete();

        $notification = array
        (
            'message' => 'Carousel Info has been deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('mainCarousel.view')->with($notification);
    }
}
