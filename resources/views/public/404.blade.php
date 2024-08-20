
@extends('layouts.main')
@push('pagetitle')
    404 
@endpush
    @section('content')
        <!-- Header End -->
        @include('includes.header-404')
        <!-- Header End -->
    @endsection  
    
    @section('page')
        <!-- 404 Start -->
        @include('includes.error')
        <!-- 404 End -->
     @endsection
        
