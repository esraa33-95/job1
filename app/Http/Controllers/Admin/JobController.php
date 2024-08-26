<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Company;
use App\Models\JobData;
use App\Traits\Common;



class JobController extends Controller
{   
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = JobData::with('category')->get();
        // dd($jobs);
        return view('admin.jobs',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::select('id','title')->get();
        $categories = Category::select('id','category_name')->get();
        return view('admin.add_job',compact('categories','companies'));
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
             'salary_to'=> 'required|numeric|gt:salary_from',
            'qualification'=> 'required|string',
             'date_line' => 'required|date',
             'published' => 'boolean',
             'category_id'=> 'required|integer|exists:categories,id',
             'company_id'=> 'required|integer|exists:companies,id',
             'image' =>'required|mimes:png,jpg,jpeg|max:2048',

        ]);
        
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
        $job = JobData::with('category')->findOrFail($id);
        return view('admin.jobs_details',compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = JobData::findOrfail($id);
        $categories = Category::select('id','category_name')->get();
        $companies = Company::select('id','title')->get();
        return view('admin.edit_jobs',compact('job','categories','companies'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
             'published' => 'boolean',
             'category_id'=> 'required|integer|exists:categories,id',
             'company_id'=> 'required|integer|exists:companies,id',
             'image' =>'sometimes|mimes:png,jpg,jpeg|max:2048',

        ]);
        
        if($request->hasFile('image')){
            $data['image'] = $this->uploadFile($request->image,'assets/img');
        }
       JobData::where('id',$id)->update($data);
       return redirect()->route('jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
      $id = $request->id;
      JobData::where('id',$id)->delete($id);
      return redirect()->route('jobs.index');
        
    }
    
}
