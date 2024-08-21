<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\PublicController;


Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'controller'=>PublicController::class,
],function(){
    Route::get('index','index')->name('index');
    Route::get('about','about')->name('about');
    Route::get('contact','contact')->name('contact');
    Route::get('category','category')->name('category');
    Route::get('testimonial','testimonial')->name('testimonial');
    Route::get('job-list','joblist')->name('joblist');
    Route::get('job-details','jobdetails')->name('jobdetails');
    
});


Route::group([
    'controller'=>AdminController::class,
    'prefix'=>'admin',
     'as'=>'job.',
],function(){
    Route::get('create','create')->name('create');
    Route::post('store','store')->name('store');
    Route::get('category','createcategory')->name('category');
    Route::post('category1','storecategory')->name('category1');
    
});
