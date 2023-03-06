<?php

namespace App\Http\Controllers\jotno_admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;
use Illuminate\Http\Request;
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
                'category_id' => 'required',
                'brand_id' => 'required',
                'weight_id' => 'required',
                'price' => 'required',
                'status' => 'required'
            ]);

            $product = new product();
            $product->creator              = auth()->user()->name;
            $product->name                 = $request->name;
            $product->slug                 = str_slug($request->name);
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
                    if(!empty($colors)){
                        foreach($colors as $color){
                            $p_color = new productColor();
                            $p_color->product_id = $product->id;
                            $p_color->color_id = $color;
                            $p_color->save();
                        }
                    }
                    // Save data in the product size table on database
                    $sizes = $request->size_id;
                    if(!empty($sizes)){
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
        $data['title'] = 'Edit Product';
        $data['editData'] = product::findOrFail($id);
        $data['categories'] = category::all();
        $data['brands']     = brand::all();
        $data['sizes']      = size::all();
        $data['colors']     = color::all();
        $data['weights']    = weight::all();

        $data['weight_array'] = productWeight::select('weight_id')->where('product_id',$data['editData']->id)->orderBy('id','desc')->get()->toArray();
        $data['color_array'] = productColor::select('color_id')->where('product_id',$data['editData']->id)->orderBy('id','desc')->get()->toArray();
        $data['size_array'] = productSize::select('size_id')->where('product_id',$data['editData']->id)->orderBy('id','desc')->get()->toArray();

        return  view('jotno.jotno_admin.admin_pages.Product.Add_&_Edit_product',$data);
    }

    public function update(productRequest $request, $id)
    {
        DB::transaction(function () use($request, $id){
            $this->validate($request,[
                'status' => 'required'
            ]);

            $product = product::find($id);
            $product->updater              = auth()->user()->name;
            $product->name                 = $request->name;
            $product->slug                 = str_slug($request->name);
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
                @unlink(public_path('jotno_admin/assets/images/product/'.$product->image));
                $file_name = date('d.m.Y') . '_' . time() . '_' . rand(0000, 9999) . '_' . 'JOTNO_PRODUCT_' . $file->getClientOriginalName();
                $file->move(public_path('jotno_admin/assets/images/product/'), $file_name);
                $product['image'] = $file_name;
            }
            if($product->save()){
                // update data in the Related Image table on database
                /*$files = $request->related_image;
                    if(!empty($files)){
                        $relatedImage = productRelatedImage::where('product_id',$id)->get()->toArray();
                            foreach ($relatedImage as $value){
                                if(!empty($value)){
                                    @unlink(public_path('jotno_admin/assets/images/productRelated/'.$value['related_image']));
                            }
                    }
                }
                    productRelatedImage::where('product_id',$id)->delete();

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
                }*/
                // update data in the product Weight table on database
                $weights = $request->weight_id;
                if(!empty($weights)){
                productWeight::where('product_id',$id)->delete();
                }
                if(!empty($weights)){
                    foreach($weights as $weight){
                        $p_weight = new productWeight();
                        $p_weight->product_id = $product->id;
                        $p_weight->weight_id = $weight;
                        $p_weight->save();
                    }
                }
                // update data in the product color table on database
                $colors = $request->color_id;
                if(!empty($colors)){
                productColor::where('product_id',$id)->delete();
                }
                if(!empty($colors)){
                    foreach($colors as $color){
                        $p_color = new productColor();
                        $p_color->product_id = $product->id;
                        $p_color->color_id = $color;
                        $p_color->save();
                    }
                }
                // Save data in the product size table on database
                $sizes = $request->size_id;
                if(!empty($sizes)){
                    productSize::where('product_id',$id)->delete();
                }
                if(!empty($sizes)){
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
                    'message' => 'Something went wrong...!!! Unable to update Product',
                    'alert-type' => 'error'
                );

                return redirect()->back()->with($notification);
            }
        });
        $notification = array
        (
            'message' => 'Product update successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('product.view')->with($notification);
    }

    public function relatedimgedit($id)
    {
        $data['title'] = 'Related Image Edit';
        $data['editData'] = product::findOrFail($id);

        return  view('jotno.jotno_admin.admin_pages.Product.Edit_related_image',$data);
    }

    public function relatedimgupdate(Request $request, $id)
    {

        $product = product::find($id);
        $product->updater              = auth()->user()->name;
        $files = $request->related_image;
        if(!empty($files)){
            $relatedImage = productRelatedImage::where('product_id',$id)->get()->toArray();
            foreach ($relatedImage as $value){
                if(!empty($value)){
                    @unlink(public_path('jotno_admin/assets/images/productRelated/'.$value['related_image']));
                }
            }
        }
        productRelatedImage::where('product_id',$id)->delete();

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

        $notification = array
        (
            'message' => 'Related Image updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.view')->with($notification);
    }

    public function delete($id)
    {
        $product = product::findOrFail($id);

        if(file_exists('public/jotno_admin/assets/images/product/'.$product->image) AND !empty($product->image))
        {
            unlink('public/jotno_admin/assets/images/product/'.$product->image);
        }

        $relatedImage = productRelatedImage::where('product_id',$id)->get()->toArray();
        if(!empty($relatedImage)){
            foreach($relatedImage as $value){
                if(!empty($value)){
                    unlink('public/jotno_admin/assets/images/productRelated/'.$value['related_image']);
                }
            }
        }
        productRelatedImage::where('product_id',$id)->delete();

        productWeight::where('product_id',$id)->delete();
        productColor::where('product_id',$id)->delete();
        productSize::where('product_id',$id)->delete();
        $product->delete();

        $notification = array
        (
            'message' => 'Product has been deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('product.view')->with($notification);
    }

    public function details($id)
    {
        $data['title'] = 'Product Details';
        $data['product'] = product::findOrFail($id);
        return view('jotno.jotno_admin.admin_pages.Product.product_details',$data);
    }


}
