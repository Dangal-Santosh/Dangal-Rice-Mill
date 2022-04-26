<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\StockController;
use App\Http\Controllers\Backend\OrderPDFController;
use App\Http\Controllers\backend\PaymentController;
use App\Http\Controllers\Backend\StockPDFController;
use App\Http\Controllers\Backend\InStockPDFController;
use App\Http\Controllers\Backend\ProductPDFController;
use App\Http\Controllers\Backend\PaymentPDFController;
use App\Http\Controllers\Backend\UserPdfController;
use App\Http\Controllers\Backend\CategoryController;


//Middleware 
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 
function () { return view('dashboard');})->name('dashboard');

// Website Controllers
Route::get('/',[IndexController::class,'welcome'])->name('welcome');
// Route::get('/homepage',[IndexController::class,'homeindex']);
Route::get('/homepage',[IndexController::class,'homeindex'])->middleware('auth','verified');

Route::get('/Adashboard',[IndexController::class,'Adashboard'])->name('Adashboard');
Route::get('/sdashboard',[IndexController::class,'sdashboard'])->name('sdashboard');
Route::get('/orderdetails',[IndexController::class,'orderdetails'])->name('orderdetails');
Route::get('/productdetails',[IndexController::class,'productdetails'])->name('productdetails');
Route::get('/paymentdetails',[IndexController::class,'paymentdetails'])->name('paymentdetails');
Route::get('/userdetails',[IndexController::class,'userdetails'])->name('userdetails');

Route::get('/bargraph',[IndexController::class,'bargraph']);
Route::get('/piechart',[IndexController::class,'piechart']);
// Route::get('/statics',[IndexController::class,'showStatics']);

//Order Controllers
Route::get('/buy_products',[OrderController::class,'product'])->name('product');
Route::get('/get_products/{id}',[OrderController::class,'get_products'])->name('get_products');
Route::get('/get_users/{id}',[OrderController::class,'get_users'])->name('get_users');

Route::get('/orderProduct/{id}',[OrderController::class,'productOrder'])->name('productOrder');
Route::post('/createOrder',[OrderController::class,'productordercreate'])->name('createOrder');
Route::post('/createOrder',[OrderController::class,'productordercreate'])->name('createOrder');
Route::get('/editorder/{id}', [OrderController::class, 'orderedit'])->name('orderedit');
Route::put('/editorder/{id}', [OrderController::class, 'orderupdate'])->name('orderupdate');
Route::get('/deleteorder/{id}', [OrderController::class, 'orderdestroy'])->name('orderdestroy');
Route::get('/vieworder/{id}', [OrderController::class, 'orderview'])->name('orderview');

//Categories Controllers
Route::get('/categories',[CategoryController::class,'categoriesindex'])->name('categoriesindex');
Route::post('/categories',[CategoryController::class,'categoriescreate'])->name('categoriescreate');
Route::get('/editcategories/{id}', [CategoryController::class, 'categoriesedit'])->name('categoriesedit');
Route::put('/editcategories/{id}', [CategoryController::class, 'categoriesupdate'])->name('categoriesupdate');
Route::get('/deletecategories/{id}', [CategoryController::class, 'categoriesdestroy'])->name('categoriesdestroy');


// User Controllers
Route::get('/user',[HomeController::class,'indexx'])->name('indexx');
Route::post('/user',[HomeController::class,'createe'])->name('createe');
Route::get('/edituser/{id}', [HomeController::class, 'editt'])->name('editt');
Route::put('/edituser/{id}', [HomeController::class, 'updatee'])->name('updatee');
Route::get('/deleteuser/{id}', [HomeController::class, 'destroyy'])->name('destroyy');



//Stock Controllers
Route::get('/instock',[StockController::class,'Instockindex'])->name('Instockindex');
Route::post('/instock',[StockController::class,'Instockcreate'])->name('Instockcreate');
Route::get('/editinstock/{id}', [StockController::class, 'Instockedit'])->name('Instockedit');
Route::put('/editinstock/{id}', [StockController::class, 'Instockupdate'])->name('Instockupdate');
Route::get('/deleteinstock/{id}', [StockController::class, 'Instockdestroy'])->name('Instockdestroy');




//Product C0ntrollers
Route::get('/get_categories/{id}',[ProductController::class,'get_category'])->name('get_category');
Route::get('/get_stocks/{id}',[ProductController::class,'get_stocks'])->name('get_stocks');
Route::get('/product',[ProductController::class,'indexxx'])->name('indexxx');
Route::post('/product',[ProductController::class,'createee'])->name('createee');
Route::get('/editproduct/{id}', [ProductController::class, 'edittt'])->name('edittt');
Route::put('/editproduct/{id}', [ProductController::class, 'updateee'])->name('updateee');
Route::get('/deleteproduct/{id}', [ProductController::class, 'destroyyy'])->name('destroyyy');



// PDF Generator Controllers 
Route::get('/order_pdf/pdf',[OrderPDFController::class,'pdf']);
Route::get('/stock_pdf/pdf',[StockPDFController::class,'pdf']);
Route::get('/in_stock_pdf/pdf',[InStockPDFController::class,'pdf']);
Route::get('/product_pdf/pdf',[ProductPDFController::class,'pdf']);
Route::get('/payment_pdf/pdf',[PaymentPDFController::class,'pdf']);
Route::get('/user_pdf/pdf',[UserPdfController::class,'pdf']);


//Payment Controllers
Route::get('/{order}/cashondelivery',[PaymentController::class, 'cashondelivery'])->name('cashondelivery');
Route::post('/place-order',[PaymentController::class,'placeorder'])->name('placeorder');



























