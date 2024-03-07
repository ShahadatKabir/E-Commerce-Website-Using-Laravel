<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Image;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::latest()->get();
        return view('backend.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         try {
            $request->validate([
                'category_name'=>['required','min:3'],
                'category_slug'=>['required','min:5'],
                'category_image'=>'required'
            ]);

        Category::create([
            'category_name'=>$request->category_name,
            'category_slug'=>$request->category_slug,
            'category_image'=>$this->uploadImage(request()->file('category_image'))
            ]);
            return redirect()->route('categories.index')->withMessage('
       Category add created successfully');

        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
         return view('backend.categories.show',
        ['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('backend.categories.edit',
            ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
          try {
            $request->validate([
                'category_name'=>['required','min:3'],
                'category_slug'=>['required','min:5'],
                'category_image'=>'required'
            ]);


            $requestData =[
                'category_name'=>$request->category_name,
                'category_slug'=>$request->category_slug,
                'category_image'=>$this->uploadImage(request()->file('category_image'))
            ];
          if ($request->hasFile('image')){
              $requestData['image']=$this->uploadImage(request()->file('image'));
          }
        $category->update($requestData);

            return redirect()->route('categories.index')->withMessage('
       Slider add created successfully');

        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
         $category->delete();

        return redirect()->route('categories.index');
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
