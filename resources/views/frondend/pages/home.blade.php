@extends('frondend.layouts.master')

@section('frontend_title','Home')

@section('frontend_content')
    @include('frondend.pages.widgets.slider')
    @include('frondend.pages.widgets.featured')
    @include('frondend.pages.widgets.count-down')
    @include('frondend.pages.widgets.best-seller')
    @include('frondend.pages.widgets.latest-product')
    @include('frondend.pages.widgets.testimonial')
@endsection
