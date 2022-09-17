@extends('backend.layouts.master')
@section('admin_title','Edit Coupon')
@push('admin_style')

@endpush

@section('admin_content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex">
                <a class="btn btn-primary" href="{{route('coupon.index')}}">
                    <i class="fa fa-backward" aria-hidden="true"></i>
                    Coupon List</a>
            </div>
        </div>
        <div class="col-md-6 m-auto">
            <h2>Edit Coupon</h2>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('coupon.update',$coupon->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="coupon_name" class="form-label">Coupon Name</label>
                            <input value="{{$coupon->coupon_name}}" type="text" class="form-control @error('coupon_name')
                                is-invalid
                            @enderror" name="coupon_name" id="coupon_name" placeholder="Enter a Coupon Name">
                            @error('coupon_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="discount_amount" class="form-label">Discount Amount</label>
                            <input type="number" value="{{$coupon->discount_amount}}" class="form-control @error('discount_amount')
                                is-invalid
                            @enderror" name="discount_amount" id="discount_amount" placeholder="Enter a Discount Amount">
                            @error('discount_amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="minimum_purchase_amount" class="form-label">Minimum Purchases Amount</label>
                            <input type="number" value="{{$coupon->minimum_purchase_amount}}" class="form-control" name="minimum_purchase_amount" id="minimum_purchase_amount">
                            @error('minimum_purchase_amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="validity_till" class="form-label">Validity</label>
                            <input type="date" value="{{$coupon->validity_till}}" class="form-control" name="validity_till" id="validity_till">
                            @error('validity_till')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" name="is_active" class="form-check-input @error('is_active')
                                is-invalid
                            @enderror" role="switch" id="is_active" @if ('1' == $coupon->is_active)
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

@endpush
