<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

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


              //    ******Back     End********

Route::get('/login',[AdminController::class,'index'])->name('login.index');
Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [SuperAdminController::class, 'logout'])->name('dashboard.logout');
Route::post('/admin-dashboard',[AdminController::class,'show_dashboard'])->name('admin.dashboard');




 //    ****** Order Related Route Be Heare ********

Route::get('/manage-order',[OrderController::class,'manage_order'])->name('manage.order');
Route::get('/view-order/{id}',[OrderController::class,'view_order']);





                              //    ****** Category-Controller ********

 Route::controller(CategoryController::class)->group(function(){
    Route::get('/category-create','create')->name('category.create');
    Route::post('/category-store','store')->name('category.store');
    Route::get('/category-all','index')->name('category.all');

    Route::get('/cat-status{category}','change_status')->name('category.status');
    Route::get('/cat-edit/{id}','edit')->name('category.edit');
    Route::get('/cat-delete/{id}','delete')->name('categorydelete');
    Route::post('/cat-update','update')->name('categoryupdate');
   });

                                 //    ******Sub Category-Controller ********

  Route::controller(SubCategoryController::class)->group(function(){
    Route::get('/subcategory-create','create')->name('subcategory.create');
    Route::post('/subcategory-store','store')->name('subcategory.store');
    Route::get('/subcategory-all','index')->name('subcategory.all');

     Route::get('/subcat-status{subcategory}','change_status')->name('subcategory.status');
     Route::get('/subcat-edit/{id}','edit')->name('subcategory.edit');
    Route::get('/subcat-delete/{id}','delete')->name('subcategory.delete');
    Route::post('/subcat-update','update')->name('subcategoryupdate');

   });


                                  //    ******Brand-Controller ********

  Route::controller(BrandController::class)->group(function(){

    Route::get('/brand-create','create')->name('brand.create');
    Route::post('/brand-store','store')->name('brand.store');
    Route::get('/brand-all','index')->name('brand.all');

     Route::get('/brand-status{brand}','change_status')->name('brand.status');
     Route::get('/brand-edit/{id}','edit')->name('brand.edit');
    Route::get('/brand-delete/{id}','delete')->name('brand.delete');
     Route::post('/brand-update','update')->name('brand.update');

  });

  //    ******Unit-Controller ********

  Route::controller(UnitController::class)->group(function(){

   Route::get('/unit-create','create')->name('unit.create');
   Route::post('/unit-store','store')->name('unit.store');
   Route::get('/unit-all','index')->name('unit.all');

    Route::get('/unit-status{unit}','change_status')->name('unit.status');
    Route::get('/unit-edit/{id}','edit')->name('unit.edit');
    Route::get('/unit-delete/{id}','delete')->name('unit.delete');
    Route::post('/unit-update','update')->name('unit.update');

 });

 //    ******SizeController-Controller ********

 Route::controller(SizeController::class)->group(function(){

   Route::get('/size-create','create')->name('size.create');
   Route::post('/size-store','store')->name('size.store');
   Route::get('/size-all','index')->name('size.all');

    Route::get('/size-status{size}','change_status')->name('size.status');
    Route::get('/size-edit/{id}','edit')->name('size.edit');
    Route::get('/size-delete/{id}','delete')->name('size.delete');
    Route::post('/size-update','update')->name('size.update');

 });

 Route::controller(ColorController::class)->group(function(){

   Route::get('/color-create','create')->name('color.create');
   Route::post('/color-store','store')->name('color.store');
   Route::get('/color-all','index')->name('color.all');

    Route::get('/color-status{color}','change_status')->name('color.status');
    Route::get('/color-edit/{id}','edit')->name('color.edit');
    Route::get('/color-delete/{id}','delete')->name('color.delete');
    Route::post('/color-update','update')->name('color.update');

 });



 Route::controller(ProductController::class)->group(function(){

   Route::get('/product-create','create')->name('product.create');
   Route::post('/product-store','store')->name('product.store');
   Route::get('/product-all','index')->name('product.all');

    Route::get('/product-status{product}','change_status')->name('product.status');
    Route::get('/product-edit/{id}','edit')->name('product.edit');
    Route::get('/product-delete/{id}','delete')->name('product.delete');
    Route::put('/product-update','update')->name('product.update');

 });


            //    ******Front --- End********

Route::get('/',[HomeController::class,'index'])->name('frond.index');
Route::get('/view-details{id}',[HomeController::class,'view_details'])->name('view.details');
Route::get('/product_by_cat{id}',[HomeController::class,'product_by_cat'])->name('productby.cat');
Route::get('/product_by_subcat{id}',[HomeController::class,'product_by_subcat'])->name('productby.subcat');
Route::get('/search',[HomeController::class,'search'])->name('search');





Route::post('/add_to_cart',[CartController::class,'add_to_cart'])->name('addto.cart');
Route::get('/delete_cart/{id}',[CartController::class,'delete_cart'])->name('delete.cart');
Route::get('/check_out',[CheckoutController::class,'index'])->name('checkout');



   //    ******Checkout Login********
Route::get('/login-check',[CheckoutController::class,'login_check'])->name('login.checkout');

 //    ******Customer Login and Registration********
Route::post('/customer-login',[CustomerController::class,'login'])->name('customer.login');
Route::post('/customer-registration',[CustomerController::class,'registration'])->name('customer.registration');

Route::get('/customer-logout',[CustomerController::class,'logout'])->name('customer.logout');

Route::post('/save-shipping-address',[CheckoutController::class,'save_shipping_address'])->name('saveshipping.address');
Route::get('/payment',[CheckoutController::class,'payment'])->name('payment');
Route::post('/place-order',[CheckoutController::class,'place_order'])->name('place.order');






