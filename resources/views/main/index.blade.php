@extends('main.layouts.pages')

@section('pageTitle')
Index
@endsection

@section('content')

 @include('main.includes.searchform')
 @include('main.includes.howitworks')
 @include('main.includes.listing')
 @include('main.includes.features')
 @include('main.includes.testimonials')
 @include('main.includes.waitforwhat')
 
@endsection
