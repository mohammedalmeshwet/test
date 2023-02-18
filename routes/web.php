<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\Auth\RegisterController;
use App\Http\Controllers\Dashboard\Auth\LogoutController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ProductController as DashboardProductController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\UserProductController;
use App\Models\Product;
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

Route::get('/', function () {
    return view('auth.login');
});









    Route::get('/home', [HomeController::class,'index'])->name('home.index');

    /**
     * Register Routes
     */
    Route::get('register', [RegisterController::class,'show'])->name('register.show');
    Route::post('register', [RegisterController::class,'register'])->name('register.perform');

    /**
     * Login Routes
     */
    Route::get('login', [LoginController::class,'show'])->name('login.show');
    Route::post('login', [LoginController::class,'login'])->name('login.perform');



    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('logout', [LogoutController::class,'perform'])->name('logout.perform');
    });
        /**
         * change Password Routes
         */
    Route::get('change-password', [UserController::class,'changePasswordShow'])->name('changePassword.show');
    Route::post('change-password',[UserController::class,'changePassword'])->name('changePassword.perform');
        /**
         * users Routes
         */
    Route::get('pofile', [UserController::class,'getProfile'])->name('profile.show');
    Route::get('users-all', [UserController::class,'index'])->name('users.all');

    // Route::get('update', [UserController::class,'edit'])->name('update.show');
    // Route::post('update',[UserController::class,'updateInformationUser'])->name('update.perform');

    Route::get('edit-user/{id}',[UserController::class,'edit']) -> name('user.edit');
    Route::post('update-user/{id}',[UserController::class,'update']) -> name('user.update');

    Route::get('create-user',[UserController::class,'create']) -> name('user.create');
    Route::post('store-user',[UserController::class,'store']) -> name('user.store');

    Route::get('delete-user/{user_id}',[UserController::class,'destroy'])->name('user.delete');

        /**
         * products Routes
         */
    Route::get('products',[ProductController::class,'index'])->name('products.index');
    Route::get('my-products',[UserProductController::class,'getProductsForUser'])->name('user.products');

    Route::get('create-product',[ProductController::class,'create']) -> name('product.create');
    Route::post('store-product',[ProductController::class,'store']) -> name('product.store');

    Route::get('edit-product/{id}',[ProductController::class,'edit']) -> name('product.edit');
    Route::post('update-product/{id}',[ProductController::class,'update']) -> name('product.update');


    Route::get('delete-product/{id}',[ProductController::class,'destroy'])->name('product.delete');


    Route::get('user-products/{id}',[UserProductController::class,'getAllProductsForUserByAdmin'])->name('user.product');

