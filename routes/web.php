<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductDetails;
use App\Http\Controllers\AdminController;
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



Route::get("/",[HomeController::class,"index"])->name("home");

//SHOP
Route::get("/shop",[ShopController::class,"index"])->name("shop");
Route::get("/shop/ajax",[ShopController::class,"allProductsAjax"]);
Route::get("/shop/newest",[ShopController::class,"ajaxNewest"]);
Route::get("/shop/popular",[ShopController::class,"ajaxPopular"]);
Route::post("/shop/sortFilter",[ShopController::class,"sortFilter"]);
Route::post("/shop/search",[ShopController::class,"search"]);

//PRODUCT DETAILS
Route::get("/details/{id}",[ProductDetails::class,"index"])->name("details");

//USER RELATED
Route::get("/login",[LoginController::class,"index"])->name("login");
Route::get("/register",[RegisterController::class,"index"])->name("register");
Route::post("/login",[LoginController::class,"loginUser"]);
Route::post("/register",[RegisterController::class,"registerUser"]);
Route::get("/logout",[LoginController::class,"logoutUser"])->name("logout");

//ADMIN
Route::get("/admin",[AdminController::class,"index"])->name("admin");

Route::post("/admin/ProductInsert",[AdminController::class,"productsInsert"])->name("productInsert");
//UPDATE
Route::get("/admin/manageProducts/update",[AdminController::class,"manageProductsUpdate"])->name("manageProductsUpdate");
Route::get("/admin/update/getProduct",[AdminController::class,"getProductUpdate"]);
Route::post("/admin/productUpdate",[AdminController::class,"productsUpdate"])->name("productsUpdate");
//DELETE
Route::get("/admin/manageProducts/delete",[AdminController::class,"manageProductsDelete"])->name("manageProductsDelete");
Route::get("/admin/delete/getProduct",[AdminController::class,"getProductDelete"]);
Route::post("/admin/productDelete",[AdminController::class,"productsDelete"])->name("productsDelete");

//ADMIN PRODUCTS MANAGEMENT END -------------------------------

//ADMIN CATEGORIES MANAGEMENT
Route::get("/adminCategories",[AdminController::class,"adminCategories"])->name("adminCategories");

//INSERT
Route::get("/admin/manageCategories/insert",[AdminController::class,"manageCategoriesInsert"])->name("manageCategoriesInsert");
Route::post("/admin/categoryInsert",[AdminController::class,"categoryInsert"])->name("categoryInsert");

//UPDATE
Route::get('/admin/manageCategories/update',[AdminController::class,"manageCategoriesUpdate"])->name("manageCategoriesUpdate");
Route::get("/admin/update/getCategory",[AdminController::class,"getCategoryUpdate"]);
Route::post("/admin/categoryUpdate",[AdminController::class,"categoryUpdate"])->name("categoryUpdate");

//DELETE
Route::get("/admin/manageCategories/delete",[AdminController::class,"manageCategoriesDelete"])->name("manageCategoriesDelete");
Route::post("/admin/categoryDelete",[AdminController::class,"categoryDelete"])->name("categoryDelete");
//ADMIN CATEGORIES MANAGEMENT END ---------------------------------

//ADMIN ANALYTICS
Route::get("/adminAnalytics",[AdminController::class,"adminAnalytics"])->name("adminAnalytics");
Route::get("/adminAnalytics/get",[AdminController::class,"getAnalytics"]);
Route::post("/adminAnalytics/filterDate",[AdminController::class,"filterDate"]);
//ADMIN ANALYTICS END

//ADD TO CART
Route::get("/cart",[CartController::class,"index"])->name("cart");
Route::post("/cart/ajax",[CartController::class,"getCartItems"]);
Route::post("/addToCart",[CartController::class,"addToCart"]);
Route::post("/addToCartPlus",[CartController::class,"addToCartPlus"]);
Route::post("/addToCartMinus",[CartController::class,"addToCartMinus"]);
Route::post("/removeFromCart",[CartController::class,"removeFromCart"]);

//ABOUT
Route::get("/about",[AboutController::class,"index"])->name("about");//ADMIN PRODUCTS MANAGEMENT ------------------------
Route::get("/adminProducts",[AdminController::class,"adminProducts"])->name("adminProducts");
//INSERT
Route::get("/admin/manageProducts/insert",[AdminController::class,"manageProductsInsert"])->name("manageProductsInsert");


//CONTACT
Route::get("/contact",[ContactController::class,"index"])->name("contact");

//EMAIL
Route::post('/emailSend', function (\Illuminate\Http\Request $request) {

    $data = [

        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'message' => $request->input('message')

    ];

    \Mail::to('danilomijailovic1@gmail.com')->send(new \App\Mail\GetMail($data));

    return redirect("/contact");

})->name("emailSend");

