@extends('backend.layouts.master')
@section('admin_title','Create Product')
@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endpush

@section('admin_content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex">
                <a class="btn btn-primary" href="{{route('products.index')}}">
                    <i class="fa fa-backward" aria-hidden="true"></i>
                    Product List</a>
            </div>
        </div>
        <div class="col-md-6 m-auto">
            <h2>Create Product</h2>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category Name</label>
                            <select class="form-control" name="category_name" id="category_name">
                                <option value="" selected disabled>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                            @error('category_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="product_name" class="form-label">New Product Name</label>
                            <input type="text" class="form-control @error('product_name')
                                is-invalid
                            @enderror" name="product_name" id="product_name" placeholder="Enter a Product Name">
                            @error('product_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col-md-5 mb-3">
                                <label for="product_price" class="form-label">Product Price</label>
                                <input type="number" class="form-control @error('product_price')
                                    is-invalid
                                @enderror" name="product_price" id="product_price" placeholder="Enter a Product Price">
                                @error('product_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="product_code" class="form-label">Product Code</label>
                                <input type="text" class="form-control @error('product_code')
                                    is-invalid
                                @enderror" name="product_code" id="product_code" placeholder="Enter a Product code">
                                @error('product_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">

                            <div class="col-md-5 mb-3">
                                <label for="product_stock" class="form-label">Product Stock</label>
                                <input type="number" class="form-control @error('product_stock')
                                    is-invalid
                                @enderror" name="product_stock" id="product_stock" placeholder="Enter a Product stock">
                                @error('product_stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="alert_quentity" class="form-label">Product Alert Quentity</label>
                                <input type="number" class="form-control @error('alert_quentity')
                                    is-invalid
                                @enderror" name="alert_quentity" id="alert_quentity" placeholder="Enter Alert Quentity">
                                @error('alert_quentity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="product_short_description" class="form-label">Product Short Description</label>
                            <textarea name="product_short_description" class="form-control" id="product_short_description" cols="30" rows="5"></textarea>
                            @error('product_short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="product_long_description" class="form-label">Product Long Description</label>
                            <textarea name="product_long_description" class="form-control" id="product_long_description" cols="30" rows="10"></textarea>
                            @error('product_long_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="addissional_info" class="form-label">Addisional Information</label>
                            <textarea name="addissional_info" class="form-control" id="addissional_info" cols="30" rows="5"></textarea>
                            @error('addissional_info')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="product_image" class="form-label">product Image</label>
                            <input type="file" class="dropify @error('product_image')
                                is-invalid
                            @enderror" name="product_image" id="product_image">
                            @error('product_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="multiple_product_image" class="form-label">Multiple Product Image</label>
                            <input type="file" class="form-control @error('multiple_product_image')
                                is-invalid
                            @enderror" name="multiple_product_image[]" multiple id="multiple_product_image">
                            @error('multiple_product_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" name="is_active" class="form-check-input @error('is_active')
                                is-invalid
                            @enderror" role="switch" id="is_active" checked>
                            <label for="is_active"  class="form-check-label">Active or Inactive</label>
                            @error('is_active')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Store</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('admin_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
    $('.dropify').dropify({
    messages: {
        'default': 'Drag a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});
</script>
@endpush
