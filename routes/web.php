<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TotalStockController;
use App\Http\Controllers\DynamicPDFController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Backend\StockPDFController;
use App\Http\Controllers\Backend\InStockPDFController;
use App\Http\Controllers\Backend\ProductPDFController;
use App\Http\Controllers\Backend\PaymentPDFController;
use App\Http\Controllers\OfflinePaymentController;
use App\Http\Controllers\CategoryController;

// use App\Http\Controllers\OfferController;
// use App\Http\Controllers\AboutController;
// use App\Http\Controllers\SuggestionController;
// use App\Http\Controllers\HomePageController;
// use App\Http\Controllers\ContactUsController;

//Middleware 
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 
function () { return view('dashboard');})->name('dashboard');

// Website Controllers
Route::get('/',[IndexController::class,'welcome'])->name('welcome');
Route::get('/homepage',[IndexController::class,'homeindex']);


Route::get('/Adashboard',[IndexController::class,'Adashboard'])->name('Adashboard');
Route::get('/sdashboard',[IndexController::class,'sdashboard'])->name('sdashboard');
Route::get('/orderdetails',[IndexController::class,'orderdetails'])->name('orderdetails');
Route::get('/productdetails',[IndexController::class,'productdetails'])->name('productdetails');
Route::get('/paymentdetails',[IndexController::class,'paymentdetails'])->name('paymentdetails');

Route::get('/bargraph',[IndexController::class,'bargraph']);
Route::get('/piechart',[IndexController::class,'piechart']);
Route::get('/statics',[IndexController::class,'showStatics']);


//Admin Controllers
Route::get('/staff',[HomeController::class,'iindex'])->name('iindex');
Route::post('/staff',[HomeController::class,'ccreate'])->name('ccreate');
Route::get('/edit/{id}',[HomeController::class,'eedit'])->name('eedit');
Route::put('/edit/{id}',[HomeController::class,'uupdate'])->name('uupdate');
Route::get('/delete/{id}',[HomeController::class,'ddestroy'])->name('ddestroy');

//Order Controllers
Route::get('/get_products/{id}',[OrderController::class,'get_products'])->name('get_products');
Route::get('/get_users/{id}',[OrderController::class,'get_users'])->name('get_users');

Route::get('/order',[OrderController::class,'orderindex'])->name('orderindex');
Route::post('/order',[OrderController::class,'ordercreate'])->name('ordercreate');
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


// Staff Controllers
Route::get('/user',[HomeController::class,'indexx'])->name('indexx');
Route::post('/user',[HomeController::class,'createe'])->name('createe');
Route::get('/edituser/{id}', [HomeController::class, 'editt'])->name('editt');
Route::put('/edituser/{id}', [HomeController::class, 'updatee'])->name('updatee');
Route::get('/deleteuser/{id}', [HomeController::class, 'destroyy'])->name('destroyy');

//Total Stock Controllers
Route::get('/stock',[TotalStockController::class,'index'])->name('index');
Route::post('/stock',[TotalStockController::class,'create'])->name('create');
Route::get('/editstock/{id}', [TotalStockController::class, 'edit'])->name('edit');
Route::put('/editstock/{id}', [TotalStockController::class, 'update'])->name('update');
Route::get('/deletestock/{id}', [TotalStockController::class, 'destroy'])->name('destroy');

//Stock Controllers
Route::get('/instock',[StockController::class,'Instockindex'])->name('Instockindex');
Route::post('/instock',[StockController::class,'Instockcreate'])->name('Instockcreate');
Route::get('/editinstock/{id}', [StockController::class, 'Instockedit'])->name('Instockedit');
Route::put('/editinstock/{id}', [StockController::class, 'Instockupdate'])->name('Instockupdate');
Route::get('/deleteinstock/{id}', [StockController::class, 'Instockdestroy'])->name('Instockdestroy');




//Product C0ntrollers
Route::get('/get_stocks/{id}',[ProductController::class,'get_stocks'])->name('get_stocks');
Route::get('/product',[ProductController::class,'indexxx'])->name('indexxx');
Route::post('/product',[ProductController::class,'createee'])->name('createee');
Route::get('/editproduct/{id}', [ProductController::class, 'edittt'])->name('edittt');
Route::put('/editproduct/{id}', [ProductController::class, 'updateee'])->name('updateee');
Route::get('/deleteproduct/{id}', [ProductController::class, 'destroyyy'])->name('destroyyy');



// PDF Generator Controllers 
Route::get('/dynamic_pdf/pdf',[DynamicPDFController::class,'pdf']);
Route::get('/stock_pdf/pdf',[StockPDFController::class,'pdf']);
Route::get('/in_stock_pdf/pdf',[InStockPDFController::class,'pdf']);
Route::get('/product_pdf/pdf',[ProductPDFController::class,'pdf']);
Route::get('/payment_pdf/pdf',[PaymentPDFController::class,'pdf']);


//QrCode for Products
// Route::get('/payment_pdf/pdf',[Controller::class,'pdf']);



//Payment Controllers
Route::get('/{order}/cashondelivery',[PaymentController::class, 'cashondelivery'])->name('cashondelivery');
Route::post('/place-order',[PaymentController::class,'placeorder'])->name('placeorder');






















//Offers Controllers
Route::get('/offers',[OfferController::class,'offersindex'])->name('offersindex');
Route::post('/offers',[OfferController::class,'offerscreate'])->name('offerscreate');
Route::get('/editoffers/{id}', [OfferController::class, 'offersedit'])->name('offersedit');
Route::put('/editoffers/{id}', [OfferController::class, 'offersupdate'])->name('offersupdate');
Route::get('/deleteoffers/{id}', [OfferController::class, 'offersdestroy'])->name('offersdestroy');

//Abouts Controllers
Route::get('/abouts',[AboutController::class,'aboutsindex'])->name('aboutsindex');
Route::post('/abouts',[AboutController::class,'aboutscreate'])->name('aboutscreate');
Route::get('/editabouts/{id}', [AboutController::class, 'aboutsedit'])->name('aboutsedit');
Route::put('/editabouts/{id}', [AboutController::class, 'aboutsupdate'])->name('aboutsupdate');
Route::get('/deleteabouts/{id}', [AboutController::class, 'aboutsdestroy'])->name('aboutsdestroy');

//Contact Us Controllers
Route::get('/contacts',[ContactUsController::class,'contactsindex'])->name('contactsindex');
Route::post('/contacts',[ContactUsController::class,'contactscreate'])->name('contactscreate');
Route::get('/editcontacts/{id}', [ContactUsController::class, 'contactsedit'])->name('contactsedit');
Route::put('/editcontacts/{id}', [ContactUsController::class, 'contactsupdate'])->name('contactsupdate');
Route::get('/deletecontacts/{id}', [ContactUsController::class, 'contactsdestroy'])->name('contactsdestroy');

//Suggestion Controller
Route::get('/suggestion',[SuggestionController::class,'suggestionsindex'])->name('suggestionsindex');
Route::post('/suggestion',[SuggestionController::class,'suggestionscreate'])->name('suggestionscreate');

//Homepage Controllers
Route::get('/homepages',[HomePageController::class,'homepageindex'])->name('homepageindex');
Route::post('/homepages',[HomePageController::class,'homepagecreate'])->name('homepagecreate');
Route::get('/edithomepages/{id}', [HomePageController::class, 'homepageedit'])->name('homepageedit');
Route::put('/edithomepages/{id}', [HomePageController::class, 'homepageupdate'])->name('homepageupdate');
Route::get('/deletehomepages/{id}', [HomePageController::class, 'homepagedestroy'])->name('homepagedestroy');








