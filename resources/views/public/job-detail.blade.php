@extends('public.layouts.main')
@push('pagetitle')
    job-details 
@endpush
@section('content')
        <!-- Header End -->
        @include('public.includes.header-jobdetail')
        <!-- Header End -->
 @endsection

 @section('page')
        <!-- Job Detail Start -->
       @include('public.includes.job-details')
        <!-- Job Detail End -->
 @endsection

 

       