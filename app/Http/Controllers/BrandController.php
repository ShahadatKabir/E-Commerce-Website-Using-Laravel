<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Image;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
     $brands = Brand::all();
     return view('backend.brands.index',[
         'brands'=>$brands
     ]);
    }

    public function create()
    {
        return view('backend.brands.create');
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'brand_name'=>['required','min:3'],
                'brand_slug'=>['required','min:5'],
                'brand_image'=>'required'
            ]);

         
            Brand::create([
                'brand_name'=>$request->brand_name,
                'brand_slug'=>$request->brand_slug,
                'brand_image'=>$this->uploadImage(request()->file('brand_image'))
            ]);
            if ($request->hasFile('image')){
              $requestData['image']=$this->uploadImage(request()->file('image'));
          }
            return redirect()->route('brands.index')->withMessage('
       Brand add created successfully');

        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }


    }

    public function show(Brand $brand)
    {
        return view('backend.brands.show',[
            'brand'=>$brand
        ]);
    }

    public function edit(Brand $brand)
    {
        return view('backend.brands.edit',[
            'brand'=>$brand
        ]);
    }

    public function update(Request $request,Brand $brand)
    {

        try {
            $request->validate([
                'brand_name'=>['required','min:3'],
                'brand_slug'=>['required','min:5'],
                'brand_image'=>'required'
            ]);

           

            $brand->update([
                'brand_name'=>$request->brand_name,
                'brand_slug'=>$request->brand_slug,
                'brand_image'=>$this->uploadImage(request()->file('brand_image'))
            ]);
            if ($request->hasFile('image')){
              $requestData['image']=$this->uploadImage(request()->file('image'));
          }
            return redirect()->route('brands.index')->withMessage('
       Slider add created successfully');

        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }

    }


    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brands.index');
    }
        public function uploadImage($file)
    {
        $fileName = time().''.$file->getClientOriginalExtension();
        Image::make($file)
            ->resize(500,500)
            ->save(storage_path().'/app/public/products/'.$fileName);
        return $fileName;
    }
}
