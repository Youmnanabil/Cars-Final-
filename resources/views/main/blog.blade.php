@extends('main.layouts.pages')

@section('pageTitle')
Blog Listing
@endsection

@section('title')
Blog
@endsection

@section('subtitle')
Blog
@endsection

@section('content')
@include('main.includes.carlisting')
@include('main.includes.blogs')
@include('main.includes.waitforwhat')
@endsection