<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FooterMenuController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GalleryController;
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

    ///Blog Category Routes Start////
    Route::get('blog/category/list',[CategoryController::class,'BlogCategoryList']);
    Route::get('blog/category/edit',[CategoryController::class,'EditBlogCategory']);
    Route::get('blog/category/add',[CategoryController::class,'AddBlogCategory']);
    Route::post('blog/category/create',[CategoryController::class,'CreateBlogCategory']);
    Route::get('blog/category/delete',[CategoryController::class,'DeleteBlogCategory']);
    ///Blog Category Routes End/////
    
    ///Event Routes Start////
    Route::get('event/list',[EventController::class,'EventList']);
    Route::get('event/edit',[EventController::class,'EditEvent']);
    Route::get('event/add',[EventController::class,'AddEvent']);
    Route::post('event/create',[EventController::class,'CreateEvent']);
    Route::get('event/delete',[EventController::class,'DeleteEvent']);
    ///Event Routes End/////
    
    ///Foter Menu Routes Start////
    Route::get('footermenu/list',[FooterMenuController::class,'allMenu'])->name('allfootermenu');
    Route::get('footermenu/edit',[FooterMenuController::class,'EditMenu']);
    Route::get('footermenu/add',[FooterMenuController::class,'AddMenu']);
    Route::post('footermenu/create',[FooterMenuController::class,'CreateMenu']);
    Route::get('footermenu/delete',[FooterMenuController::class,'DeleteMenu']);
    ///Foter Menu Routes End/////

    ////Image Gallery Routes Start//////
    Route::get('/gallery/list',[GalleryController::class,'allImages']);
    Route::get('/gallery/add',[GalleryController::class,'addImages']);
    Route::get('/gallery/edit',[GalleryController::class,'addImages']);
    Route::post('/gallery/create',[GalleryController::class,'createGallery']);
    Route::get('gallery/delete',[GalleryController::class,'deleteGallery']);
    Route::get('gallery/image/delete',[GalleryController::class,'deleteImage']);
    ////Image Gallery Routes End///////
});
    //Front Routes///
    Route::get('/',[FrontController::class,'index']);
    Route::get('/venue',[FrontController::class,'allVenues'])->name('allvenue');
    Route::post('/submitenquiry',[FrontController::class,'submitenquiry'])->name('submitenquiry');
    Route::get('/blogs',[FrontController::class,'allBlogs'])->name('allblogs');
    Route::any('/blog/{title}',[FrontController::class,'blogDetails']);
    Route::any('/venue/{title}',[FrontController::class,'vanueDetails']);
    Route::any('/banquetlist/{title}',[FrontController::class,'banquetlist']);
    Route::any('/banquetlist/{location}/{url}',[FrontController::class,'banquetDetails']);
    Route::any('/banquet/{url}',[FrontController::class,'banquetPageDetails']);
    Route::get('galley/all',[FrontController::class,'allGallery'])->name('allgallery');
    Route::get('/getGallary',[FrontController::class,'getGallary']);

    ////Static page routes
    Route::get('anniversary-celebration',[FrontController::class,'aniversary']);
    Route::get('wow-birthday-theme',[FrontController::class,'birthday']);
    Route::get('this-is-why-people-love-to-party-at-3bros',[FrontController::class,'whychoose']);
    Route::get('why-3bros-is-best-party-hall-in-noida',[FrontController::class,'bestparty']);
    Route::get('contact-us',[FrontController::class,'contactus']);
    Route::get('/privacy-policy',[FrontController::class,'privacy'])->name('privacy-policy');
    Route::get('/terms-and-condition',[FrontController::class,'termandcondition'])->name('terms-and-condition');
    Route::get('/disclaimer',[FrontController::class,'disclaimer'])->name('disclaimer');
    Route::get('/coffee-date-package',[FrontController::class,'cofeedate'])->name('cofeedate');
    Route::get('/gold-candle-light-dinner-package',[FrontController::class,'candlelight'])->name('candlelight');
    Route::get('/mahabharat-sizzler',[FrontController::class,'mahabharat'])->name('mahabharat');
    Route::get('/popular-candle-light-dinner-rs-1999',[FrontController::class,'popularcandel'])->name('popularcandel');
    Route::get('/ring-ceremony-package',[FrontController::class,'ringceremony'])->name('ringceremony');
    Route::get('/silver-candle-light-dinner-rs-2999',[FrontController::class,'silvercandel'])->name('silvercandel');