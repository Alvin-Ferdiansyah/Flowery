<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FlowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// --- TAMPILAN PUBLIK / CUSTOMER ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/koleksi', [HomeController::class, 'collection'])->name('collections.index');
Route::get('/buket/{slug}', [FlowerController::class, 'show'])->name('flowers.show');

// Keranjang
Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
Route::post('/keranjang', [CartController::class, 'add'])->name('cart.add');
Route::delete('/keranjang/{itemId}', [CartController::class, 'destroy'])->name('cart.destroy');

// Checkout & Resi / Status Pembayaran Berhasil
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::post('/midtrans/notification', [CheckoutController::class, 'notification'])->name('midtrans.notification');
Route::get('/order-status', [OrderStatusController::class, 'show'])->name('order.status');

// Dashboard User / Customer
Route::get('/dashboard', fn () => redirect()->route('profile.edit'))
    ->middleware(['auth'])
    ->name('dashboard');

// --- PANEL ADMIN FLORIST ---
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', AdminProductController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::patch('orders/{order}', [AdminOrderController::class, 'update'])->name('orders.update');
    Route::get('customers', [AdminCustomerController::class, 'index'])->name('customers.index');
    Route::get('reports', [AdminReportController::class, 'index'])->name('reports.index');
});

// Shortcut /admin jika belum login diarahkan ke login
Route::get('/admin-login', fn () => redirect()->route('login'))->name('admin.login');

// --- USER PROFILE & AUTH ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
    Route::get('/home', [HomeController::class, 'index']);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/verify-email', [VerificationController::class, 'notice'])->name('verification.notice');
    Route::get('/verify-email/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('/email/verification-notification', [VerificationController::class, 'send'])->middleware('throttle:6,1')->name('verification.send');

    Route::get('/confirm-password', [ConfirmPasswordController::class, 'show'])->name('password.confirm');
    Route::post('/confirm-password', [ConfirmPasswordController::class, 'store'])->middleware('throttle:6,1');
});

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
