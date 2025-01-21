<?php
use Illuminate\Support\Facades\Route;


Route::post('/summernoteimage/upload','DashboardController@ImageUpload')->name('ImageUpload');




Route::get('/pagedetail','PageDetailController@list')->name('pageDetailList');
Route::get('/pagedetail/insert','PageDetailController@create')->name('createPageDetail');
Route::post('/pagedetail/insert','PageDetailController@insert')->name('insertPageDetail');
Route::get('/pagedetail/update/{pageDetail}','PageDetailController@edit')->name('editPageDetail');
Route::post('/pagedetail/update/{pageDetail}','PageDetailController@update')->name('updatePageDetail');
Route::post('/pagedetail/delete/{pageDetail}','PageDetailController@delete')->name('deletePageDetail');


Route::get('/enquiry/enquirylist','EnquiryController@enquiryList')->name('enquiryList');
Route::get('/enquirydetail/{id}','EnquiryController@enquiryDetail')->name('enquirydetail');