@extends('backend.layouts.master')
@section('admin_title','Create Update')
@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endpush

@section('admin_content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex">
                <a class="btn btn-primary" href="{{route('category.index')}}">
                    <i class="fa fa-backward" aria-hidden="true"></i>
                    Category List</a>
            </div>
        </div>
        <div class="col-md-6 m-auto">
            <h2>Create Category</h2>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('category.update',$category->slug)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" value="{{$category->title}}" class="form-control @error('category_name')
                                is-invalid
                            @enderror" name="category_name" id="category_name">
                            @error('category_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_image" class="form-label">Category Image</label>
                            <input type="file" data-default-file="{{asset('uploads/category')}}/{{$category->category_image}}" class="dropify @error('category_image')
                                is-invalid
                            @enderror" name="category_image" id="category_image">
                            @error('category_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" name="is_active" class="form-check-input @error('is_active')
                                is-invalid
                                @enderror" role="switch" id="is_active" @if ($category->is_active)
                                checked
                            @endif>
                            <label for="is_active"  class="form-check-label">Active or Inactive</label>
                            @error('is_active')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-warning">Update</button>
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
