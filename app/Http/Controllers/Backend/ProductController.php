<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\ProductImage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('is_active', 1)
            ->with('category')
            ->latest('id')
            ->select(['id', 'category_id', 'product_name', 'product_slug', 'product_stock', 'product_rating', 'alert_quentity', 'product_image', 'product_price', 'created_at', 'product_short_description', 'product_long_description'])
            ->paginate();
        return view('backend.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select(['id', 'title'])->get();
        return view('backend.pages.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        //dd($request->all());
        $product = Product::create([
            'category_id' => $request->category_name,
            'product_name' => $request->product_name,
            'product_slug' => Str::slug($request->product_name),
            'product_price' => $request->product_price,
            'product_code' => $request->product_code,
            'product_stock' => $request->product_stock,
            'alert_quentity' => $request->alert_quentity,
            'product_short_description' => $request->product_short_description,
            'product_long_description' => $request->product_long_description,
            'addissional_info' => $request->addissional_info,
            'is_active' => $request->filled('is_active'),
        ]);

        $this->imageUploaded($request, $product->id);

        $this->multipleProductImage($request, $product->id);

        Toastr::success('Product Added Successfully');
        return redirect()->route('products.index');
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
        $categories = Category::select(['id', 'title'])->get();
        $product = Product::where('product_slug', $slug)->first();
        //dd("Product: $product","Category: $categories","Product Category Id: $product->category_id");
        return view('backend.pages.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $slug)
    {
        $product = Product::where('product_slug', $slug)->first();
        $product->update([
            'category_id' => $request->category_name,
            'product_name' => $request->product_name,
            'product_slug' => Str::slug($request->product_name),
            'product_price' => $request->product_price,
            'product_code' => $request->product_code,
            'product_stock' => $request->product_stock,
            'alert_quentity' => $request->alert_quentity,
            'product_short_description' => $request->product_short_description,
            'product_long_description' => $request->product_long_description,
            'addissional_info' => $request->addissional_info,
            'is_active' => $request->filled('is_active'),
        ]);

        $this->imageUploaded($request, $product->id);

        $this->multipleProductImage($request,$product->id);

        Toastr::success('Product Updated Successfully');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $product = Product::where('product_slug', $slug)->first();

        if ('default_product.png' != $product->product_image) {
            $photo_location = 'public/uploads/product/' . $product->product_image;
            unlink(base_path($photo_location));
        }
        $product->delete();

        Toastr::success('Product Deleted Successfully');
        return redirect()->route('products.index');
    }

    public function imageUploaded($request, $item_id)
    {
        $product = Product::findOrFail($item_id);

        if ($request->hasFile('product_image')) {
            if ('default_product.png' != $product->product_image) {
                $photo_location = 'public/uploads/product/' . $product->product_image;
                unlink(base_path($photo_location));
            }
            $photo_location = 'public/uploads/product/';
            $uploaded_photo = $request->file('product_image');
            $new_photo_name = $product->id . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_location . $new_photo_name;
            Image::make($uploaded_photo)->resize(600, 600)->save(base_path($new_photo_location));

            $product->update([
                'product_image' => $new_photo_name,
            ]);
        }
    }

    public function multipleProductImage($request, $product_id)
    {
        if ($request->hasFile('multiple_product_image')) {

            $multiple_images = ProductImage::where('product_id', $product_id)->get();

            foreach ($multiple_images as $multiple_image) {
                if ('default_product.png' != $multiple_image->multiple_product_image) {
                    //delete images
                    $photo_location = 'public/uploads/product/' . $multiple_image->multiple_product_image;
                    unlink(base_path($photo_location));
                }
                //delete images name in DB
                $multiple_image->delete();
            }
            $flag = 1;
            foreach ($request->file('multiple_product_image') as $single_photo) {

                $photo_location = 'public/uploads/product/';
                $new_photo_name = $product_id . '-' . $flag . '.' . $single_photo->getClientOriginalExtension();
                $new_photo_location = $photo_location . $new_photo_name;

                Image::make($single_photo)->resize(600, 600)->save(base_path($new_photo_location));
                ProductImage::create([
                    'product_id' => $product_id,
                    'multiple_product_image' => $new_photo_name
                ]);
                $flag++;
            }
        }
    }
}
