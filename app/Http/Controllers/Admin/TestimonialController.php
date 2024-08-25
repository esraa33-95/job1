<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobData;
use App\Models\Testimonial;
use App\Traits\Common;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.add_testimonial');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'comment' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'published' => 'boolean',
            'profession' => 'required|string',

        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->image, 'assets/img');
        }
        Testimonial::create($data);
        return 'success';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = JobData::with('category')->findOrFail($id);
        // dd($job)
        return view('admin.job_details', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
