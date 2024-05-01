<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PlaceTypeController;

Route::get('/admin/', function () {
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin/dashboard', function () { return view('dashboard'); })->name('dashboard');
});

Route::group(['prefix' => 'admin'], function(){
    ////Menu Routes Start//////
    Route::get('menu/listmenu', [MenuController::class, 'listmenu'])->name('listmenu');
    Route::get('menu/edit/{id}', [MenuController::class, 'edit'])->name('edit');
    Route::get('menu/delete/{id}', [MenuController::class, 'delete'])->name('delete');
    Route::get('menu/add', [MenuController::class, 'add'])->name('add');
    Route::post('menu/submit', [MenuController::class, 'submit'])->name('submit');
    Route::post('menu/update/{id}', [MenuController::class, 'update'])->name('update');
    Route::get('menu/fetch_page/{name}', [MenuController::class, 'fetch_page'])->name('fetch_page');
    /////Menu Routes End/////

    ////Page Routes Start/////
    Route::get('page/listpage', [PageController::class, 'listpage'])->name('listpage');
    Route::get('page/edit/{id}', [PageController::class, 'edit'])->name('edit');
    Route::get('page/delete/{id}', [PageController::class, 'delete'])->name('delete');
    Route::get('page/add', [PageController::class, 'add'])->name('add');
    Route::post('page/submit', [PageController::class, 'submit'])->name('submit');
    Route::post('page/update/{id}', [PageController::class, 'update'])->name('update');
    Route::get('page/fetch_page/{name}', [PageController::class, 'fetch_page'])->name('fetch_page');
    ////Page Routes End//////

    ////Blogs Routes Start////
    Route::get('blog/list',[BlogController::class,'BlogList']);
    Route::get('blog/edit',[BlogController::class,'EditBlog']);
    Route::get('blog/add',[BlogController::class,'AddBlog']);
    Route::post('blog/create',[BlogController::class,'CreateBlog']);
    Route::get('blog/delete',[BlogController::class,'DeleteBlog']);
    ////Blogs Routes End//////

    ///Place Routes Start/////
    Route::get('place/list',[PlaceTypeController::class,'PlaceList']);
    Route::get('place/edit',[PlaceTypeController::class,'EditPlace']);
    Route::get('place/add',[PlaceTypeController::class,'AddPlace']);
    Route::post('place/create',[PlaceTypeController::class,'CreatePlace']);
    Route::get('place/delete',[PlaceTypeController::class,'DeletePlace']);
    ///Place Routes Ends/////

    ///Category Routes Start////
    Route::get('category/list',[CategoryController::class,'CategoryList']);
    Route::get('category/edit',[CategoryController::class,'EditCategory']);
    Route::get('category/add',[CategoryController::class,'AddCategory']);
    Route::post('category/create',[CategoryController::class,'CreateCategory']);
    Route::get('category/delete',[CategoryController::class,'DeleteCategory']);
    ///Category Routes End/////
    
    ///Event Routes Start////
    Route::get('event/list',[EventController::class,'EventList']);
    Route::get('event/edit',[EventController::class,'EditEvent']);
    Route::get('event/add',[EventController::class,'AddEvent']);
    Route::post('event/create',[EventController::class,'CreateEvent']);
    Route::get('event/delete',[EventController::class,'DeleteEvent']);
    ///Event Routes End/////
});
    //Front Routes///
    Route::get('/',[FrontController::class,'index']);
    Route::get('/allvenue',[FrontController::class,'allVenues'])->name('allvenue');
    Route::post('/submitenquiry',[FrontController::class,'submitenquiry'])->name('submitenquiry');
    Route::get('/privacy-policy',function(){ return view('privacy-policy');})->name('privacy-policy');
    Route::get('/terms-and-condition',function(){ return view('terms-and-condition');})->name('terms-and-condition');
    Route::get('/disclaimer',function(){ return view('disclaimer');})->name('disclaimer');
    Route::get('/blogs',[FrontController::class,'allBlogs'])->name('allblogs');
    Route::any('/blog-detail/{id}',[FrontController::class,'blogDetails']);