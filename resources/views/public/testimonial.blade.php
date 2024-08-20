@extends('public.layouts.main')
@push('pagetitle')
    Testimonial
@endpush
@section('content')
        <!-- Header End -->
        @include('public.includes.header-test')
        <!-- Header End -->
 @endsection
 
 @section('page')
        <!-- Testimonial Start -->
        @include('public.includes.test')
        <!-- Testimonial End -->
@endsection

        