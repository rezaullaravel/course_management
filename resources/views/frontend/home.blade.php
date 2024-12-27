@extends('frontend.master')

@section('title')
{{ 'Home Page' }}
@endsection
@section('content')
 <!-- hero -->
 @include('frontend.partials.hero')

 <!-- Marquee -->
@include('frontend.partials.marquee')

 <!-- about us -->
 @include('frontend.partials.about')

 <!-- our course -->
 @include('frontend.partials.course')

 <!-- TODO: MD screen line show -->
 <!-- study with us -->
 @include('frontend.partials.study-us')

 <!-- Our Instructors -->
 @include('frontend.partials.teacher')

 <!-- Pricing -->
 @include('frontend.partials.package')

 <!-- E-books -->
 @include('frontend.partials.ebook')

 <!-- TODO add background -->
 <!--  Testimonial -->
 @include('frontend.partials.testimonial')

 <!-- Blog -->
 @include('frontend.partials.blog')


@endsection
