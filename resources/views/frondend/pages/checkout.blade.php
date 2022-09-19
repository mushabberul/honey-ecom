@extends('frondend.layouts.master')

@section('frontend_title','Checkout Page')
@push('frontend_style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('frontend_content')
    @include('frondend.layouts.inc.breadcumb',['pagename'=>'Checkout'])

    <!-- checkout-area start -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <form action="{{route('customar.placeorder')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-form form-style">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-sm-12 col-12">
                                    <p>Full Name *</p>
                                    <input type="text" name="fullname">
                                </div>
                                <div class="col-sm-12 col-12">
                                    <p>Email Address *</p>
                                    <input type="email" name="email">
                                </div>
                                <div class="col-sm-12 col-12">
                                    <p>Phone No. *</p>
                                    <input type="text" name="phone">
                                </div>
                                <div class="col-sm-12 col-12 mb-3">
                                    <p>Selete a District *</p>
                                    <select name="district_id" id="district_id" class="form-control js-example-basic-single">
                                        <option value="" disabled selected>Select a District</option>
                                        @foreach ($districts as $district)
                                            <option value="{{$district->id}}">{{$district->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 col-12 mb-3">
                                    <p>Selete a Upazila*</p>
                                    <select name="upazila_id" id="upazila_id" class="form-control js-example-basic-single">
                                        <option value="" disabled selected>Seletct a Upazila</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <p>Your Address *</p>
                                    <input type="text">
                                </div>
                                <div class="col-12">
                                    <p>Order Notes </p>
                                    <textarea name="massage" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order-area">
                            <h3>Your Order</h3>
                            <ul class="total-cost">
                                @foreach ($carts as $item)
                                    <li>{{ $item->name }} X {{ $item->qty }} <span class="pull-right">৳ {{ $item->price*$item->qty }}</span></li>
                                @endforeach

                                @if (Session::has('coupon'))

                                    <li>Discount <span class="pull-right"><strong> (-) ৳ {{ Session::get('coupon')['discount_amount'] }}</strong></span></li>
                                    <li>Total<span class="pull-right">৳ {{ Session::get('coupon')['balance'] }} <del class="text-danger">৳ {{ Session::get('coupon')['cart_total'] }}</del></span></li>
                                    @else
                                        <li>Total<span class="pull-right">৳ {{ $total }}</span></li>
                                        <li>Subtotal <span class="pull-right"><strong>৳ {{ $total }}</strong></span></li>

                                @endif
                            </ul>
                            <ul class="payment-method">
                                <li>
                                    <input id="delivery" type="checkbox">
                                    <label for="delivery">Cash on Delivery</label>
                                </li>
                            </ul>
                            <button type="submit">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- checkout-area end -->

@endsection
@push('frontend_script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        $('#district_id').on('change',function(){
            let district_id = $(this).val();
            //console.log(district_id)
            if(district_id){
                $.ajax({
                    url: "{{url('/upzilla/ajax')}}/" + district_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        //console.log(data);
                        let d = $('#upazila_id').empty();
                        $.each(data,function(key,value){
                            $('#upazila_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            }
        });
    </script>
@endpush
