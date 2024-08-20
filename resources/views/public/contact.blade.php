@extends('public.layouts.main')

@push('pageTitle')
Contact US
@endpush
@section('content')
        <!-- Header End -->
        @include('public.includes.about-header')
        <!-- Header End -->
 @endsection
 
 @section('page')
     
        <!-- Contact Start -->
        @include('public.includes.contact1')
        <!-- Contact End -->
@endsection

       