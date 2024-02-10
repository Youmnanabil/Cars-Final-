@extends('main.layouts.pages')

@section('pageTitle')
About Us Listings
@endsection

@section('title')
About Us
@endsection

@section('subtitle')
About Us
@endsection

@section('content')
@include('main.includes.carlisting')
@include('main.includes.about')
@include('main.includes.waitforwhat')
@endsection