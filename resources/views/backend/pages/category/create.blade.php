@extends('backend.layouts.master')
@section('admin_title','Create Category')
@push('admin_style')

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
                    <form action="{{route('category.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">New Category</label>
                            <input type="text" class="form-control @error('title')
                                is-invalid
                            @enderror" name="title" id="title" placeholder="Enger a Cateogory Name">
                            @error('title')
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

@endpush
