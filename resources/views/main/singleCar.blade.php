@extends('main.layouts.pages')

@section('pageTitle')
Car Details
@endsection

@section('title')
Single Blog Posts Title
@endsection

@section('subtitle')
Posted on May 22, 2020
@endsection

@section('content')
@include('main.includes.carlisting')
@include('main.includes.single')
@endsection