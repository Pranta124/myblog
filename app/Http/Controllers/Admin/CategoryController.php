<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());
    
        $this->validate($request,[
            'name' => 'required|max:255|unique:categories',
            'description' => 'sometimes|max:1000',
            'image' => 'required | image | mimes:jpg,jpeg,png'
        ]);
        //image
       $image = $request->image;
       $imageName = Str::slug($request->name,'-') . uniqid() . '.' . $image->getClientOriginalExtension();
       if(!Storage::disk('public')->exists('category'))
       {
           Storage::disk('public')->makeDirectory('category');
       }
       //Store
       $image->storeAs('category',$imageName,'public');
        //
        
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->description = $request->description;
        $category->image = $imageName;
        $category->save();
        Toastr::success('success','Category created Successfully :)');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        if($request->name == Category::findOrFail($id)->name)
        {
            $this->validate($request,[
                'name' => 'required|max:255',
                'description' => 'sometimes|max:1000',
                "image" =>'sometimes|image|mimes:jpg,png,bmp,jpeg'
            ]);
        }else
        {
            $this->validate($request,[
                'name' => 'required|max:255|unique:categories',
                'description' => 'sometimes|max:1000',
                "image" =>'sometimes|image|mimes:jpg,png,bmp,jpeg'
            ]);
        }
        $category = Category::findOrFail($id);
       if ($request->image != null)
       {
              //image
       $image = $request->image;
       $imageName = Str::slug($request->name,'-') . uniqid() . '.' . $image->getClientOriginalExtension();
       if(!Storage::disk('public')->exists('category'))
       {
           Storage::disk('public')->makeDirectory('category');
       }
       //delete old image
       if (Storage::disk('public')->exists('category/' . $category->image))
       {
        Storage::disk('public')->delete('category/' . $category->image);
       }
       //Store
       $image->storeAs('category',$imageName,'public');
        //
       }else{
           $imageName = $category->image;
       }
       
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->description = $request->description;
        $category->image = $imageName;
        $category->save();
        Toastr::success('success','Category Updated Successfully :)');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $category = Category::findOrFail($id);
        $category->delete();
        Toastr::success('success','Category deleted Successfully :)');
        return redirect()->back();
    }
}
