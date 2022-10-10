<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/doctors', 'Api\DoctorController@index')->name('api.doctors.index');
Route::get('/doctors/{doctor}', 'Api\DoctorController@show')->name('api.doctors.show');
Route::post('/search', 'Api\DoctorController@search')->name('api.doctors.search');
Route::get('/search/city', 'Api\DoctorController@city')->name('api.doctors.city');
Route::get('/search/specialization', 'Api\DoctorController@specialization')->name('api.doctors.specialization');
Route::get('/search/specialization/id', 'Api\DoctorController@specializationId')->name('api.doctors.specializationId');
Route::post('/review', 'Api\ReviewController@store')->name('api.doctors.review');
Route::post('/message', 'Api\MessageController@store')->name('api.doctors.message');
Route::get('/orders/generate', 'Api\SponsorshipController@generate');
Route::post('/orders/make/payment', 'Api\SponsorshipController@makePayment');
Route::get('/sponsorships', 'Api\SponsorshipController@index');
