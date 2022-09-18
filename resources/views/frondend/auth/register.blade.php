@extends('frondend.layouts.master')

@section('frontend_title','Registation Page')
@section('frontend_content')
    @include('frondend.layouts.inc.breadcumb',['pagename'=>'Register'])
    <!-- checkout-area start -->
    <div class="account-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="account-form form-style">
                        <form action="{{route('register.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="name">User Name</label>
                              <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                              @error('name')
                                <div class="text-danger">{{$message}}</div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="phone">Phone Number</label>
                              <input type="tel" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number">
                              @error('phone')
                                <div class="text-danger">{{$message}}</div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="email">Email address</label>
                              <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                              @error('email')
                                <div class="text-danger">{{$message}}</div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                              @error('password')
                                <div class="text-danger">{{$message}}</div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="password_confirmation">Confirmation Password</label>
                              <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confrmation Password">
                              @error('password_confirmation')
                                <div class="text-danger">{{$message}}</div>
                              @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                        <div class="text-center">
                            <a href="{{route('login.page')}}">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->

@endsection
