<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'controller' => PublicController::class,
], function () {
    Route::get('index', 'index')->name('index');
    Route::get('about', 'about')->name('about');
    Route::get('contact', 'contact')->name('contact');
    Route::get('category', 'category')->name('category');
    Route::get('testimonial', 'testimonial')->name('testimonial');
    Route::get('job-list', 'joblist')->name('joblist');
    Route::get('job-details/{id}', 'jobdetails')->name('jobdetails');
    Route::post('job-apply', 'jobApply')->name('apply_job');
    
});

//admin
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {

        Route::group(['prefix' => 'admin'], function () {
            Route::group([
                'controller' => JobController::class,
                'prefix' => 'jobs',
                'as' => 'jobs.',

            ], function () {
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::get('index', 'index')->name('index');
                Route::get('{id}/show', 'show')->name('show');
                Route::get('{id}/edit', 'edit')->name('edit');
                Route::put('{id}/update', 'update')->name('update');
                Route::delete('{id}/delete', 'destroy')->name('delete');
                Route::delete('{id}/restore', 'restore')->name('restore');
            });

            Route::group([
                'controller' => CategoryController::class,
                'prefix' => 'categories',
                'as' => 'categories.',
            ], function () {
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::get('index', 'index')->name('index');
                Route::get('{id}/edit', 'edit')->name('edit');
                Route::put('{id}/update', 'update')->name('update');
            });
            Route::group([
                'controller' => TestimonialController::class,
                'prefix' => 'test',
                'as' => 'test.',
            ], function () {
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
            });
            Route::group([
                'controller' => CompanyController::class,
                'prefix' => 'company',
                'as' => 'company.',
            ], function () {
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
            });

        });
    });




Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('contactus', [PublicController::class, 'contact'])->name('contact.index');
Route::post('contactus', [ContactController::class, 'send'])->name('contact.send');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
