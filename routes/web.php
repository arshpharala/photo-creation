<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\PermissionController;
use App\Models\Role;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('test', function(){
    $user = User::first();
    $user->password = bcrypt('Pa$$w0rd');
    $user->save();
});


Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\IndexController::class, 'index']);
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/banner/{banner}', [App\Http\Controllers\BannerController::class, 'index'])->name('banner');




Route::post('/send/enquiry',[App\Http\Controllers\EnquiryController::class,'insertEnquiry'])->name('sendEnquiry');

Route::post('/enquiry/validate',[App\Http\Controllers\EnquiryController::class,'validateEnquiry'])->name('validateEnquiry');



Route::get('/blog',[App\Http\Controllers\BlogController::class,'index'])->name('blog');

Route::get('/login', function () {
    return view('welcome');
});


Auth::routes(['register'=>false]);


Route::middleware('auth')->group(function(){


    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('modules', ModuleController::class);

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::post('/summernoteimage/upload',[App\Http\Controllers\DashboardController::class,'ImageUpload'])->name('ImageUpload');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/user',      [App\Http\Controllers\UserController::class,'userList'])->name('userList');
Route::get('/user/insert','UserController@createUser')->name('createUser');
Route::post('/user/insert','UserController@insertUser')->name('insertUser');
Route::get('/user/update/{user}','UserController@editUser')->name('editUser');
Route::post('/user/update/{user}','UserController@updateUser')->name('updateUser');
Route::post('/user/delete/{user}',"UserController@deleteUser")->name('deleteUser');
Route::get("/changepassword",[App\Http\Controllers\UserController::class,'changepass'])->name('changePassword');
Route::post('changepassword', [App\Http\Controllers\UserController::class,'changePassword'])->name('changepasswordRoute');
Route::get("/updateProfile",[App\Http\Controllers\UserController::class,'editProfile'])->name('editProfile');
Route::post('updateProfile', [App\Http\Controllers\UserController::class,'updateProfile'])->name('updateProfileRoute');



Route::get('/pagedetail',[App\Http\Controllers\PageDetailController::class,'list'])->name('pageDetailList');
// Route::get('/pagedetail',['App\Http\Controllers\PageDetailController::class,'list'])->name('pageDetailList');
Route::get('/pagedetail/insert',[App\Http\Controllers\PageDetailController::class,'create'])->name('createPageDetail');
Route::post('/pagedetail/insert',[App\Http\Controllers\PageDetailController::class,'insert'])->name('insertPageDetail');
Route::get('/pagedetail/update/{pageDetail}',[App\Http\Controllers\PageDetailController::class,'edit'])->name('editPageDetail');
Route::post('/pagedetail/update/{pageDetail}',[App\Http\Controllers\PageDetailController::class,'update'])->name('updatePageDetail');
Route::post('/pagedetail/delete/{pageDetail}',[App\Http\Controllers\PageDetailController::class,'delete'])->name('deletePageDetail');


Route::get('/blog/list',[App\Http\Controllers\BlogController::class,'list'])->name('blogList');
Route::get('/blog/insert',[App\Http\Controllers\BlogController::class,'create'])->name('createBlog');
Route::post('/blog/insert',[App\Http\Controllers\BlogController::class,'insert'])->name('insertBlog');
Route::get('/blog/update/{blog}',[App\Http\Controllers\BlogController::class,'edit'])->name('editBlog');
Route::post('/blog/update/{blog}',[App\Http\Controllers\BlogController::class,'update'])->name('updateBlog');
Route::post('/blog/delete/{blog}',[App\Http\Controllers\BlogController::class,'delete'])->name('deleteBlog');


Route::get('/enquiry/enquirylist',[App\Http\Controllers\EnquiryController::class,'enquiryList'])->name('enquiryList');
Route::get('/enquirydetail/{id}',[App\Http\Controllers\EnquiryController::class,'enquiryDetail'])->name('enquirydetail');

Route::get('cms/banner/list',[App\Http\Controllers\BannerController::class,'list'])->name('bannerList');
Route::get('cms/banner/create',[App\Http\Controllers\BannerController::class,'create'])->name('createBanner');
Route::post('cms/banner/insert',[App\Http\Controllers\BannerController::class,'insert'])->name('insertBanner');
Route::post('cms/banner/update/{banner}',[App\Http\Controllers\BannerController::class,'update'])->name('editBanner');
Route::get('cms/banner/update/{banner}',[App\Http\Controllers\BannerController::class,'edit'])->name('updateBanner');
Route::get('cms/banner/delete/{banner}',[App\Http\Controllers\BannerController::class,'delete'])->name('deleteBanner');


Route::get('/website/list',[App\Http\Controllers\WebsiteController::class,'list'])->name('websiteList');
Route::get('/website/create',[App\Http\Controllers\WebsiteController::class,'create'])->name('createWebsite');
Route::post('/website/insert',[App\Http\Controllers\WebsiteController::class,'insert'])->name('insertWebsite');
Route::post('/website/update/{website}',[App\Http\Controllers\WebsiteController::class,'update'])->name('editWebsite');
Route::get('/website/update/{website}',[App\Http\Controllers\WebsiteController::class,'edit'])->name('updateWebsite');
Route::get('/website/delete/{website}',[App\Http\Controllers\WebsiteController::class,'delete'])->name('deleteWebsite');

});
