@extends('public.layouts.main')
@push('pageTitle')
category
@endpush
@section('content')
        <!-- Header End -->
        @include('public.includes.header-cat')
        <!-- Header End -->
@endsection
@section('page')

        <!-- Category Start -->
        @include('public.includes.category1')
        <!-- Category End -->
 @endsection

       