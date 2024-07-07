<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/customers', [CustomersController::class, 'index'])->name('customers.index');
    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    
    // Tambahkan route untuk ProductController
    Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/products/{id}', [ProductsController::class, 'show'])->name('products.show');
    Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');
    Route::get('/products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit');
    
    // Tambahkan route untuk OrdersController
    Route::get('/orders/create', [OrdersController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrdersController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}', [OrdersController::class, 'show'])->name('orders.show');
    Route::get('/orders/{order}/edit', [OrdersController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{order}', [OrdersController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{order}', [OrdersController::class, 'destroy'])->name('orders.destroy');
    
    // Tambahkan route untuk CustomerController
    Route::get('/customers/create', [CustomersController::class, 'create'])->name('customers.create');
    Route::post('/customers', [CustomersController::class, 'store'])->name('customers.store');
    Route::get('/customers/{id}', [CustomersController::class, 'show'])->name('customers.show');
    Route::get('/customers/{id}/edit', [CustomersController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{id}', [CustomersController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{id}', [CustomersController::class, 'destroy'])->name('customers.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
Route::post('/logout', function () {
    request()->session()->invalidate();
    Auth::logout();
    return redirect('/');
})->name('logout');

use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';
