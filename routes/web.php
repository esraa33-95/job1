<?php

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
