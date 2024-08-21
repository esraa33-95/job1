<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\JobData;
use Illuminate\Http\Request;
use App\Traits\Common;

class AdminController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id','category_name')->get();
        return view('admin.add_job',compact('categories'));
    }

    public function createcategory()
    {
        
        return view('admin.add_category');
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
             'published' => 'boolean',
             'category_id'=> 'required|integer|exists:categories,id',
             'image' =>'required|mimes:png,jpg,jpeg|max:2048',

        ]);
        if($request->hasFile('image')){
            $data['image'] = $this->uploadFile($request->image,'assets/img');
        }
       JobData::create($data);
       return 'send successfully';

    }
    public function storecategory(Request $request)
    {
        $data = $request->validate([
            'category_name'=> 'required|string',
            'image' =>'required|mimes:png,jpg,jpeg|max:2048',
  
        ]);
       
        if($request->hasFile('image')){
            $data['image'] = $this->uploadFile($request->image,'assets/img');
        }
       Category::create($data);
       return 'send successfully';

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
