<?php

use \App\Http\Controllers\Front;
use \App\Http\Controllers\Admin;
use App\Http\Controllers\Front\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::match(['get', 'post'],'/', function () {
//     //return view('welcome');
//     return view('front.index');

//     //return \App\Models\Product::all();
//     //return \App\Models\Brand::find(2)->products;
//     //return \App\Models\Product::find(1)->brand;//brand của product có id 1
//     //return \App\Models\Product::find(1)->productImages;//productImages của Product có id 1

// });

//Front(Client)
Route::get('/',[Front\HomeController::class, 'index']);
// Route::get('/',function(\App\Repositories\Product\ProductRepositoryInterface $productRepository){
//     //return view('front.index');
//     return $productRepository->find(1);
// });
// Route::get('/',function(\App\Service\Product\ProductServiceInterface $productService){
//     //return view('front.index');
//     return $productService->find(1);
// });

Route::prefix('shop')->group(function(){
    //cung tien to shop, nhom 2 route lai "'/shop/product/{id}'"
    Route::get('/product/{id}', [Front\ShopController::class, 'show']);
    Route::post('/product/{id}', [Front\ShopController::class, 'postComment']);
    
    Route::get('/',[Front\ShopController::class, 'index']);

    Route::get('/{categoryName}', [Front\ShopController::class, 'category']);
});

Route::prefix('cart')->group(function(){
    Route::get('add/{id}', [Front\CartController::class, 'add']);
    Route::get('/', [Front\CartController::class, 'index']);
    Route::get('delete/{rowid}', [Front\CartController::class, 'delete']);
    Route::get('/destroy', [Front\CartController::class, 'destroy']);
    Route::get('/update', [Front\CartController::class, 'update']);

});

Route::prefix('checkout')->group(function(){

    Route::get('/', [Front\CheckOutController::class, 'index']);
    Route::post('/', [Front\CheckOutController::class, 'addOrder']);//post de nhan data tu <form>
    Route::get('/vnPayCheck', [Front\CheckOutController::class, 'vnPayCheck']);
    Route::get('/result', [Front\CheckOutController::class, 'result']);


});
Route::prefix('account')->group(function(){
    Route::get('/login', [Front\AccountController::class, 'login']);
    Route::post('/login', [Front\AccountController::class, 'checkLogin']);
    Route::get('/logout', [Front\AccountController::class, 'logout']);

    Route::get('/register', [Front\AccountController::class, 'register']);
    Route::post('/register', [Front\AccountController::class, 'postRegister']);

    Route::prefix('my-order')->middleware('CheckMemberLogin')->group(function(){
        Route::get('/',[Front\AccountController::class, 'myOrderIndex']);
        Route::get('{id}',[Front\AccountController::class, 'myOrderShow']);
        
    });


});

//Dashboard (Admin)
Route::prefix('admin')->middleware('CheckAdminLogin')->group(function(){
    Route::redirect('', 'admin/user');

    Route::resource('user', Admin\UserController::class);
    Route::resource('category', Admin\ProductCategoryController::class);
    Route::resource('brand', Admin\BrandController::class);
    Route::resource('product/{product_id}/image', Admin\ProductImageController::class);
    Route::resource('product/{product_id}/detail', Admin\ProductDetailController::class);
    Route::resource('product', Admin\ProductController::class);

    Route::prefix('login')->group(function(){
        Route::get('', [Admin\HomeController::class, 'getLogin'])->withoutMiddleware('CheckAdminLogin');
        Route::post('', [Admin\HomeController::class, 'postLogin'])->withoutMiddleware('CheckAdminLogin');
    });
    
    Route::get('logout', [Admin\HomeController::class, 'logout']);
});
