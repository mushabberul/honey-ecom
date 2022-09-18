@extends('frondend.layouts.master')

@section('frontend_title','Dashboard')
@section('frontend_content')
    @include('frondend.layouts.inc.breadcumb',['pagename'=>'User Dashboard'])

    <h2>{{$user->name}}</h2>
@endsection
