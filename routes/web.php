<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard/user', function() {
    return view('dashboards.user');
})->name('dashboard.user');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard/admin', [DashboardController::class, 'adminDashboard'])->name('dashboard.admin');

Route::get('/menu/view', function () {
    return view('menu.view');
})->name('menu.view');

Route::get('/cart/view', function () {
    return view('cart.view');
})->name('cart.view');

Route::get('/order/track', function () {
    return view('order.track');
})->name('order.track');

Route::get('/menu/manage', function () {
    return view('menu.manage');
})->name('menu.manage');

Route::get('/order/incoming', function () {
    return view('order.incoming');
})->name('order.incoming');

Route::get('/order/update', function () {
    return view('order.update');
})->name('order.update');

Route::get('/items/unavailable', function () {
    return view('items.unavailable');
})->name('items.unavailable');

Route::get('/items/highlight', function () {
    return view('items.highlight');
})->name('items.highlight');

Route::get('/revenue/daily', function () {
    return view('revenue.daily');
})->name('revenue.daily');

Route::get('/promotions/add', function () {
    return view('promotions.add');
})->name('promotions.add');

Route::get('/order/incoming', [ManagerController::class, 'viewIncomingOrders'])->name('order.incoming');
Route::get('/order/update', [ManagerController::class, 'viewOrderStatus'])->name('order.update');
Route::post('/order/update/{order_id}', [ManagerController::class, 'updateOrderStatus'])->name('order.updateStatus');

Route::get('/items/unavailable', [ManagerController::class, 'viewMenuAvailability'])->name('items.unavailable');
Route::post('/items/update/{item_id}', [ManagerController::class, 'updateAvailability'])->name('items.availability');

Route::get('/items/highlight', [ManagerController::class, 'viewHighlights'])->name('items.highlight');
Route::post('/items/toggle/{item_id}', [ManagerController::class, 'toggleHighlight'])->name('items.highlights');
