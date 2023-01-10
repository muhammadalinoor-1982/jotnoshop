<?php

namespace App\Http\Controllers\jotno_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\product;
use App\category;
use App\brand;
use App\size;
use App\color;
use App\weight;
use App\productSize;
use App\productColor;
use App\productWeight;
use App\productRelatedImage;

class productController extends Controller
{
    public function view()
    {
        $data['title'] = 'Product List';
        $data['products'] = product::orderBy('id','desc')->get();
        $data['serial'] = 1;
        return  view('jotno.jotno_admin.admin_pages.Product.product_list',$data);
    }

    public function create()
    {
        $data['title']='Add New';
        $data['products']   = product::all();
        $data['categories'] = category::all();
        $data['brands']     = brand::all();
        $data['sizes']      = size::all();
        $data['colors']     = color::all();
        $data['weights']    = weight::all();
        return view('jotno.jotno_admin.admin_pages.Product.Add_&_Edit_product',$data);
    }

    public function store(Request $request)
    {
        DB::transaction(function () use($request){
            $this->validate($request,[
                'name' => 'required|unique:products,name',
                'status' => 'required'
            ]);

            $product = new product();
            $product->creator              = auth()->user()->name;
            $product->name                 = $request->name;
            $product->quantity             = $request->quantity;
            $product->price                = $request->price;
            $product->disc_price           = $request->disc_price;
            $product->category_id          = $request->category_id;
            $product->brand_id             = $request->brand_id;
            $product->description          = $request->description;
            $product->overview             = $request->overview;
            $product->status               = $request->status;

            if ($request->file('image'))
            {
                $file = $request->file('image');
                $file_name = date('d.m.Y') . '_' . time() . '_' . rand(0000, 9999) . '_' . 'JOTNO_PRODUCT_' . $file->getClientOriginalName();
                $file->move(public_path('jotno_admin/assets/images/product/'), $file_name);
                $product['image'] = $file_name;
            }
            if($product->save()){
                // Save data in the Related Image table on database
            $files = $request->related_image;
                if(!empty($files)){
                    foreach($files as $file){
                        $file_name = date('d.m.Y') . '_' . time() . '_' . rand(0000, 9999) . '_' . 'JOTNO_PRODUCT_RI_' . $file->getClientOriginalName();
                        $file->move(public_path('jotno_admin/assets/images/productRelated/'), $file_name);
                        $relatedImage['related_image'] = $file_name;

                        $relatedImage = new productRelatedImage();
                        $relatedImage->product_id = $product->id;
                        $relatedImage->related_image = $file_name;
                        $relatedImage->save();
                    }
                }
                // Save data in the product Weight table on database
                $weights = $request->weight_id;
                    if(!empty($weights)){
                        foreach($weights as $weight){
                            $p_weight = new productWeight();
                            $p_weight->product_id = $product->id;
                            $p_weight->weight_id = $weight;
                            $p_weight->save();
                        }
                    }
                    // Save data in the product color table on database
                    $colors = $request->color_id;
                    if(!empty($weights)){
                        foreach($colors as $color){
                            $p_color = new productColor();
                            $p_color->product_id = $product->id;
                            $p_color->color_id = $color;
                            $p_color->save();
                        }
                    }
                    // Save data in the product size table on database
                    $sizes = $request->size_id;
                    if(!empty($weights)){
                        foreach($sizes as $size){
                            $p_size = new productSize();
                            $p_size->product_id = $product->id;
                            $p_size->size_id = $size;
                            $p_size->save();
                        }
                    }
            }
            else
            {
                $notification = array
                (
                    'message' => 'Something went wrong...!!! Unable to store Product',
                    'alert-type' => 'error'
                );

                return redirect()->back()->with($notification);
            }
        });
        $notification = array
        (
            'message' => 'Product inserted successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('product.view')->with($notification);
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
