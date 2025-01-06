@extends('frontend.master')

@section('title')
{{ 'Pricing Page' }}
@endsection
@section('content')

 <!-- Pricing -->
 @include('frontend.partials.package')

 <!-- our course -->
 @include('frontend.partials.course')

 <!-- E-books -->
 @include('frontend.partials.ebook')

 <!-- Blog -->
 @include('frontend.partials.blog')


@endsection
