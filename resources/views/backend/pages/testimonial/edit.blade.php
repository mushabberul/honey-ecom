@extends('backend.layouts.master')
@section('admin_title','Edit Testimonial')
@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endpush

@section('admin_content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex">
                <a class="btn btn-primary" href="{{route('testimonial.index')}}">
                    <i class="fa fa-backward" aria-hidden="true"></i>
                    Testimonial List</a>
            </div>
        </div>
        <div class="col-md-6 m-auto">
            <h2>Create Testimonial</h2>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('testimonial.update',$testimonial->client_name_slug)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="client_name" class="form-label">Client Name</label>
                            <input value="{{$testimonial->client_name}}" type="text" class="form-control @error('client_name')
                                is-invalid
                            @enderror" name="client_name" id="client_name" placeholder="Enter a Client Name">
                            @error('client_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="client_designation" class="form-label">Client Designation</label>
                            <input type="text" value="{{$testimonial->client_designation}}" class="form-control @error('client_designation')
                                is-invalid
                            @enderror" name="client_designation" id="client_designation" placeholder="Enter a Client Designation">
                            @error('client_designation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="client_message" class="form-label">Client Message</label>
                            <textarea class="form-control" name="client_message" id="client_message" cols="10" rows="10">{{$testimonial->client_message}}</textarea>
                            @error('client_message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="client_image" class="form-label">Client Image</label>
                            <input type="file" name="client_image" id="client_image" class="dropify" data-default-file="{{asset('uploads/testimonial'.'/'.$testimonial->client_image)}}" />
                            @error('client_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" name="is_active" class="form-check-input @error('is_active')
                                is-invalid
                            @enderror" role="switch" id="is_active" @if ($testimonial->is_active)
                                checked
                            @endif>
                            <label for="is_active"  class="form-check-label">Active or Inactive</label>
                            @error('is_active')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
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
