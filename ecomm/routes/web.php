<?php
use app\Http\Middleware;
use App\Http\Controllers\AdminView;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\View;
use App\Http\Controllers\MainController;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::get('/',[View::class,'homePage']);
route::view('/add/cart','layouts.cart');
route::get('/cart/products',[View::class,'cartProducts']);
route::get('/order/details',[View::class,'orderDetails']);

route::get('/product/details/{id}',[MainController::class,'details'])->name('a');


//for admin
route::get('add/new/products',[AdminView::class,'productView']);

route::post('/addProducts',[MainController::class,'insertProduct']);//form to add new Poducts
route::post('/',[MainController::class,'searchProducts']);//to search using product name in homepage
route::get('add/new/products',[MainController::class,'displayCategories'])->middleware('adminCheck');
route::get('/',[MainController::class,'displayingProduct']);

route::post('/add-to-cart',[MainController::class,'addToCart'])->middleware('auth');

route::get('/cart/products',[MainController::class,'cartItems'])->name('cartItems');
route::get('/order/details',[MainController::class,'orderInfo']);

//to remove cart items
route::get('/remove/cart/items/{id}',[MainController::class,'removeCartItems']);
route::post('/submit/order',[MainController::class,'submitOrder']);
