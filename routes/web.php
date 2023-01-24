<?php
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendConrtoller;
use App\Http\Controllers\Frontend\VendorController;
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


Route::get('/', [FrontendConrtoller::class, 'index']);
Route::post('/add/to/card', [CartController::class, 'addToCart']);


Route::get('/user/login', [FrontendConrtoller::class, 'userLogin']);
Route::get('/user/register', [FrontendConrtoller::class, 'userRegister']);


//vendor controller

Route::get('/vendor/register', [VendorController::class, 'vendorRegister']);
Route::get('/vendor/login', [VendorController::class, 'vendorLoginclick']);
Route::post('/vendor/registration', [VendorController::class, 'vendorRegistration']);
Route::post('/vendor/login', [VendorController::class, 'vendorLogin']);
Route::get('/vendor/dashboard', [VendorController::class, 'vendorDashboard']);
Route::get('/vendor/product/create', [VendorController::class, 'vendorProductCreateForm']);
Route::post('/vendor/product/store', [VendorController::class, 'vendorProductStore']);
Route::get('/vendor/logout', [VendorController::class, 'vendorLogout']);
// AdminController route

Route::get('/admin/login', [AdminController::class, 'adminLoginForm']);
Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);
Route::post('/admin/login', [AdminController::class, 'adminLogin']);
Route::get('/admin/logout', [AdminController::class, 'adminLogout']);


// Category controller

Route::get('/category/create', [CategoryController::class, 'categoryCreate']);
Route::Post('/category/store', [CategoryController::class, 'categoryStore']);
Route::get('/category/manage', [CategoryController::class, 'categoryManage']);
Route::get('/category/delete/{id}', [CategoryController::class, 'categoryDelete']);
Route::get('/category/adit/{id}', [CategoryController::class, 'categoryEdit']);
Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate']);

// subcategory controller

Route::get('/subcategory/create', [SubcategoryController::class, 'subcategoryCreate']);
Route::get('/subcategory/manage', [SubcategoryController::class, 'subcategoryManage']);
Route::post('/Subcategory/store', [SubcategoryController::class, 'subcategoryStore']);
Route::post('/Subcategory/update{id}', [SubcategoryController::class, 'subcategoryUpdate']);
Route::get('/subcategory/delete/{id}', [SubcategoryController::class, 'subcategoryDelete']);
Route::get('/subcategory/adit/{id}', [SubcategoryController::class, 'subcategoryEdit']);

// Brand controller

Route::get('/brand/create', [BrandController::class, 'brandCreate']);
Route::get('/brand/manage', [BrandController::class, 'brandManage']);
Route::post('/brand/store', [BrandController::class, 'brandStore']);
Route::post('/brand/update/{id}', [BrandController::class, 'brandUpdate']);
Route::get('/brand/adit/{id}', [BrandController::class, 'brandEdit']);
Route::get('/brand/delete/{id}', [BrandController::class, 'brandDeleted']);


//size controller

Route::get('/size/create', [SizeController::class, 'sizeCreate']);
Route::post('/size/store', [SizeController::class, 'sizeStore']);
Route::get('/size/manage', [SizeController::class, 'sizeManage']);
Route::post('/size/update{id}', [SizeController::class, 'sizeUpdate']);
Route::get('/size/adit/{id}', [SizeController::class, 'sizeEdit']);
Route::get('/size/delete/{id}', [SizeController::class, 'sizeDelete']);


// Color controller

Route::get('/color/create', [ColorController::class, 'colorCreate']);
Route::post('/color/store', [ColorController::class, 'colorStore']);
Route::get('/color/manage', [ColorController::class, 'colorManage']);
Route::post('/color/update{id}', [ColorController::class, 'colorUpdate']);
Route::get('/color/adit/{id}', [ColorController::class, 'colorEdit']);
Route::get('/color/delete/{id}', [ColorController::class, 'colorDelete']);

// Supplier Controller

Route::get('/vendors', [SupplierController::class, 'vendors']);
Route::get('/admin/vendor/approved/{id}', [SupplierController::class, 'vendorApproved']);
Route::get('/admin/vendor/pending/{id}', [SupplierController::class, 'vendorPending']);
Route::get('/admin/vendor/delete/{id}', [SupplierController::class, 'vendorDelete']);
Route::get('/vendors/products', [SupplierController::class, 'vendorProducts']);
Route::get('/vendor/product/approved/{id}', [SupplierController::class, 'vendorProductApproved']);
Route::get('/vendor/product/pending/{id}', [SupplierController::class, 'vendorProductPending']);
Route::get('/vendor/product/delete/{id}', [SupplierController::class, 'vendorProductDelete']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
