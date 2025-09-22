<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvestorController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function(){
    return redirect()->route('login');
});
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'user'])->name('dashboard');
*/
Route::middleware(['auth', 'verified', 'user'])->group(function(){
    Route::get('/dashboard', [InvestorController::class, 'investorDashboard'])->name('dashboard');
});



//ADMIN ROUTE
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'adminDashboard'])->name('admin');
    
});

//
/*
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');
});
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Management - create,edit,delete
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/findbymonth', [AdminController::class, 'findByMonth'])->name('admin.users.findbymonth');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
    Route::put('/admin/users/{id}', [AdminController::class, 'update'])->name('admin.users.update');
    // Reset password user
    Route::get('/admin/users/{id}/resetpassword', [AdminController::class, 'resetPassword'])->name('admin.users.resetpassword');
    Route::put('/admin/users/{id}/resetpassword', [AdminController::class, 'updatePassword'])->name('admin.users.updatepassword');

    Route::get('/admin/users/create', [AdminController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.users.store');

    //Investment Management
    Route::get('/admin/users/{id}/investment', [AdminController::class, 'investment'])->name('admin.users.investment');

    // Investment category
    //Route::get('/admin/investments/create', [AdminController::class, 'createInvestment'])->name('admin.investments.create');
    Route::post('/admin/investments/store/{user_id}', [AdminController::class, 'storeInvestment'])->name('admin.investments.store');
    Route::delete('/admin/investments/{investment_id}', [AdminController::class, 'destroyInvestment'])->name('admin.investments.destroy');
    Route::get('/admin/investments/{id}/edit', [AdminController::class, 'editInvestment'])->name('admin.investments.edit');
    Route::put('/admin/investments/{id}', [AdminController::class, 'updateInvestment'])->name('admin.investments.update');
    Route::post('/admin/investments/{user_id}/transfer', [AdminController::class, 'transferInvestment'])->name('admin.investments.transfer');

    // Sales category
    //Route::get('/admin/sales/create', [AdminController::class, 'createSale'])->name('admin.sales.create');
    Route::post('/admin/sales/store/{user_id}', [AdminController::class, 'storeSale'])->name('admin.sales.store');
    Route::delete('/admin/sales/{sale_id}', [AdminController::class, 'destroySale'])->name('admin.sales.destroy');
    Route::get('/admin/sales/{id}/edit', [AdminController::class, 'editSale'])->name('admin.sales.edit');
    Route::put('/admin/sales/{id}', [AdminController::class, 'updateSale'])->name('admin.sales.update');

    // Payments category
    //Route::get('/admin/payments/create', [AdminController::class, 'createPayment'])->name('admin.payments.create');
    Route::post('/admin/payments/store/{user_id}', [AdminController::class, 'storePayment'])->name('admin.payments.store');
    Route::delete('/admin/payments/{payment_id}', [AdminController::class, 'destroyPayment'])->name('admin.payments.destroy');
    Route::get('/admin/payments/{id}/edit', [AdminController::class, 'editPayment'])->name('admin.payments.edit');
    Route::put('/admin/payments/{id}', [AdminController::class, 'updatePayment'])->name('admin.payments.update');

    //Export
    Route::get('/admin/users/export', [AdminController::class, 'exportUsers'])->name('admin.users.export');

    //Investor Dashboard
    Route::get('/dashboard/statement', [InvestorController::class, 'getStatementByMonth'])->name('dashboard.statement');
    Route::get('/statement/pdf', [InvestorController::class, 'exportStatementPdf'])->name('statement.pdf');
});


require __DIR__.'/auth.php';
