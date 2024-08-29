<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JobData;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $jobs = JobData::where('published', 1)->get();
        $categories = Category::get();
        $testimonials = Testimonial::where('published', 1)->get();
        return view('public.index',compact('testimonials','jobs','categories'));
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
        return view('public.category', compact('categories'));
    }

    public function testimonial()
    {
        $testimonials = Testimonial::where('published', 1)->get();
        return view('public.testimonial',compact('testimonials'));
    }

    public function joblist()
    {
        $jobs = JobData::where('published', 1)->get();
        return view('public.job-list',compact('jobs'));
    }

    public function jobdetails(string $id)
    {
        $job = JobData::findOrfail($id);
        return view('public.job-detail',compact('job'));
    }

    public function jobApply(Request $request)
    {
        dd("send email to the admin who has created the job");
    }
    
    public function jobs()
    {
        $categories = Category::with(['jobs' => function ($query) { $query->where('published', 1)->take(3);}])->limit(4)->get();
        //dd($categories);
        return view('public.jobs',compact('categories'));
    }

}
