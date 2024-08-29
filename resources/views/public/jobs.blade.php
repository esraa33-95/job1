@extends('public.layouts.main')
@section('content')
    


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Jobs</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Jobs</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->

        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Browse Jobs By Categories</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 {{ $loop->first ? 'active' : '' }}" data-bs-toggle="pill" href="#tab-{{$category->id}}">
                                <h6 class="mt-n1 mb-0">{{$category->category_name}}</h6>
                            </a>
                        </li>
                      @endforeach
                        
                    </ul>
                    <div class="tab-content">
                        @foreach($categories as $category)
                        <div id="tab-{{$category->id}}" class="tab-pane fade show p-0 ">
                            <div class="job-item p-4 mb-4">
                                @foreach ($category->jobs as $job)
                                <div class="row g-4 ">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('assets/img/com-logo-1.jpg')}}" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">{{$job->title}}</h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2">{{$job->location}}</i></span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$job->job_nature}}</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>${{$job->salary_from}} - ${{$job->salary_to}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                            <a class="btn btn-primary" href="">Apply Now</a>
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: {{$job->date_line}}</small>
                                    </div>
                                  
                                </div>
                                @endforeach
                            </div>
                            
                            <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>
                        </div>
                     
                        @endforeach 
                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs End -->

 @endsection
        