<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\JobData;

class PublicController extends Controller
{
    public function index()
    {
        return view('public.index');
    }
    public function about()
    {
        return view('public.about');
    }
    public function contact()
    {
        return view('public.contact');
    }

    public function category()
    {
        $categories = Category::latest()->take(8)->get();
        return view('public.category',compact('categories'));
    }
    public function testimonial()
    {
        return view('public.testimonial');
    }
    public function joblist()
    {
        return view('public.job-list');
    }
    
    public function jobdetails(String $id)
    {
        $job=JobData::with(['company'])->findOrFail($id);
        dd($job);
        return view('public.job-detail',compact('job'));
    }

    public function jobApply(Request $request)
    {
    dd("send email to the admin who has created the job");
    }

    public function error()
    {
        return view('public.404');
    }

}
