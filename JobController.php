<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\JobData;
use App\Traits\Common;
use Illuminate\Validation\Rules\GreaterThan;

class JobController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        JobData::get();
        $jobs=JobData::with('category')->get();
        return view ('admin.jobs',compact('jobs'));
    }
 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id','category_name')->get();
        return view('admin.add_job',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=> 'required|string',
            'description'=>'required|string',
            'responsability'=> 'required|string',
            'job_nature'=> 'required|string',
            'location' => 'required|string',
            'salary_from'=> 'required|numeric',
             'salary_to'=> 'required|numeric',
            'qualification'=> 'required|string',
             'date_line' => 'required|date',
             'category_id'=> 'required|integer|exists:categories,id',
             'image' =>'required|mimes:png,jpg,jpeg|max:2048',

        ]);
        $data['published']=isset($request->published);
        if($request->hasFile('image')){
        $data['image'] = $this->uploadFile($request->image,'assets/img');
        }

       JobData::create($data);
       return redirect()->route('jobs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jobs = JobData::with('category')->findOrFail($id);
        return view('admin.jobs_details',compact('jobs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = JobData::with('category')->findOrFail($id);
        $categories = Category::all();
        return view('admin.edit_job',compact('job','categories'));
    }
   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       // dd($request,$id);
        $data = $request->validate([
            'title'=> 'required|string',
            'description'=>'required|string',
            'responsability'=> 'required|string',
            'job_nature'=> 'required|string',
            'location' => 'required|string',
            'salary_from'=> 'required|numeric',
             'salary_to'=> 'required|numeric',
            'qualification'=> 'required|string',
             'date_line' => 'required|date',
             'category_id'=> 'sometimes|integer|exists:categories,id',
             'image' =>'sometimes|mimes:png,jpg,jpeg|max:2048',

        ]);
       
        if($request->hasFile('image')){
            $data['image'] = $this->uploadFile($request->image,'assets/img');
        } 
        $data['published']=isset($request->published);
                JobData::where('id',$id)->update($data);
                return redirect()->route('jobs.index');
               // dd($data);
    }
  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
