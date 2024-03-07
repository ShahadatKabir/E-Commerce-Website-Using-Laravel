<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        //
        $products = Product::latest()->get();

        return view('backend.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.products.create',compact('brands','categories')
        );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create([
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'product_name'=>$request->product_name,
            'brand_slug'=>strtolower(str_replace('','_',$request->product_name)),
            'selling_price'=>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_descp'=>$request->short_descp,
            'status'=>1,
            'image'=>$this->uploadImage(request()->file('image'))

        ]);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('backend.products.show',['product'=>$product]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.products.edit',['product'=>$product],compact('brands','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $requestData =[
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'product_name'=>$request->product_name,
            'brand_slug'=>strtolower(str_replace('','_',$request->product_name)),
            'selling_price'=>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_descp'=>$request->short_descp,
            'status'=>1,
        ];
        if ($request->hasFile('image')){
            $requestData['image']=$this->uploadImage(request()->file('image'));
        }
        $product->update($requestData);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }


    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);

        return redirect()->route('products.index')->withMessage('product Inactive successfully?');
    }

    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);

        return redirect()->route('products.index')->withMessage('product Active successfully?');
    }
    public function uploadImage($file)
    {
        $fileName = time().''.$file->getClientOriginalExtension();
        Image::make($file)
            ->resize(800,800)
            ->save(storage_path().'/app/public/products/'.$fileName);
        return $fileName;
    }


}
