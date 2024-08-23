<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Testimonial;


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
        $testimonials = Testimonial::where('published', 1)->get();
        return view('public.testimonial',compact('testimonials'));
    }
    public function joblist()
    {
        return view('public.job-list');
    }
    public function jobdetails()
    {
        return view('public.job-detail');
    }
    
}
