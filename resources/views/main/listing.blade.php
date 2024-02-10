@extends('main.layouts.pages')

@section('pageTitle')
Car listing
@endsection

@section('title')
Listings
@endsection

@section('subtitle')
Listings
@endsection

@section('content')
               
@include('main.includes.carlisting')
@include('main.includes.listing')
@include('main.includes.listingpagination')
@include('main.includes.testimonials')
@include('main.includes.waitforwhat')

@endsection