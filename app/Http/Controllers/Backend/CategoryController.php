<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest('id')->select(['id', 'title', 'slug', 'created_at', 'category_image'])->paginate();
        return view('backend.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        //dd($request->all());
        $category = Category::create([
            'title' => $request->category_name,
            'slug' => Str::slug($request->category_name)
        ]);

        $this->uploadImage($request, $category->id);

        Toastr::success('Category Created Successfully');
        return redirect()->route('category.index');
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
    public function edit($slug)
    {
        $category = Category::whereSlug($slug)->first();
        return view('backend.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $slug)
    {
        //dd($request->all());
        $category = Category::whereSlug($slug)->first();
        $category->update([
            'title' => $request->category_name,
            'slug' => Str::slug($request->category_name),
            'is_active' => $request->filled('is_active'),
        ]);

        $this->uploadImage($request, $category->id);

        Toastr::success('Category Updated Successfully');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category = Category::whereSlug($slug)->first();

        if ($category->category_image) {
            if ('category_default_image.png' != $category->category_image) {
                $photo_location = 'uploads/category/' . $category->category_image;
                unlink($photo_location);
            }
        }
        $category->delete();
        Toastr::success('Category Deleted Successfully');
        return back();
    }
    public function uploadImage($request, $item_id)
    {
        $category = Category::findOrFail($item_id);
        if ($request->hasFile('category_image')) {
            if ('category_default_image.png' != $category->category_image) {
                $photo_location = 'public/uploads/category/' . $category->category_image;
                unlink(base_path($photo_location));
            }
            $photo_location = 'public/uploads/category/';
            $uploaded_photo = $request->file('category_image');
            $photo_new_name = $category->id . '.' . $uploaded_photo->getClientOriginalExtension();
            $photo_new_location = $photo_location . $photo_new_name;
            Image::make($uploaded_photo)->resize(600, 470)->save(base_path($photo_new_location));

            $category->update([
                'category_image' => $photo_new_name,
            ]);
        }
    }
}
