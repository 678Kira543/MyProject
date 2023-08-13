<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
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
Route::get("/cart", [CartController::class, 'showCart'])->middleware(['auth']);
Route::get('/addProductInCart/{product_id}', [CartController::class, 'addProductInCart'])->middleware(['auth']);
Route::post('/changeQuantity', [CartController::class, 'changeQuantity'])->middleware(['auth']);
Route::get('/continueShopping', [CartController::class, 'continueShopping'])->middleware(['auth']);
Route::get('/myOrders', [CartController::class, 'showMyOrders'])->middleware(['auth']);
Route::get('/dashboard', [CartController::class, 'showAllOrders'])->middleware(['admin'])->name('dashboard');
Route::post('/changeStatus', [CartController::class, 'changeStatus'])->middleware(['auth', 'admin']);

Route::get('/', [ProductController::class, 'showAllProduct']);
Route::get('/mainPage', [ProductController::class, 'showAllProduct']);
Route::view('/addProduct', 'pages.addProduct')->middleware(['auth', 'admin']);
Route::post('/addProduct', [ProductController::class, 'addProduct'])->middleware(['auth', 'admin']);
Route::get('/product/{id}', [ProductController::class, 'showProductById']);
Route::post('/addReview', [ProductController::class, 'addReview'])->middleware(['auth']);
Route::get('/profile', [UserController::class, 'showProfile'])->middleware(['auth']);
Route::post('/updateUserData', [UserController::class, 'updateUserData'])->middleware(['auth']);
Route::post('/changeUserAvatar', [UserController::class, 'changeUserAvatar'])->middleware(['auth']);
Route::get('/deleteReview/{id}', [ProductController::class, 'deleteReview'])->middleware(['auth']);
require __DIR__.'/auth.php';


