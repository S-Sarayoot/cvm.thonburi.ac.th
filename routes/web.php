<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\NewPasswordController;

// Landing Page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/news', function () {
    return view('news.page');
});

Route::get('/news/{id}', function () {
    return view('knowLedgeRepository.detail');
});

Route::get('/repository', function () {
    return view('knowLedgeRepository.page');
});
Route::get('/repository/{id}', function () {
    return view('knowLedgeRepository.detail');
});

Route::get('/project', function () {
    return view('project.page');
});
Route::get('/project/{id}', function () {
    return view('project.detail');
});

Route::get('/showcase', function () {
    return view('showcase.page');
});

Route::get('/showcase/{id}', function () {
    return view('showcase.detail');
});

Route::get('/about', function () {
    return view('knowLedgeRepository.detail');
});




// สลับ Route ในกรณีเพื่อไม่ให้ user เข้า admin page ได้
Route::get('/admin', function(){
    if (Auth::check()) {
        if (Auth::user()->is_admin == '1') {
            return redirect()->route('admin');
        } else {
            return redirect()->route('user');
        }
    }
    return redirect()->route('login');
});

Route::get('/user', function(){
    if (Auth::check()) {
        if (Auth::user()->is_admin == '1') {
            return redirect()->route('admin');
        } else {
            return redirect()->route('user');
        }
    }
    return redirect()->route('login');
});
// register
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);





// ---------SECTION MOCKUP RESET PASSWORD------------------
Route::get('/reset-password', function () {
    return view('auth.login'); // เปลี่ยนเป็นหน้า login
})->name('password.reset');

// Auth (สมมติว่าต้อง login)
Route::get('/profile', function () {
    return view('auth.profile');
})->name('profile');
// -----------------END MOCKUP RESET PASSWORD-------------------------------------------------
// media routes
Route::get('/all-media', function () {
    return null; view('all-media');
})->name('all-media');

// USER ROUTE
Route::middleware(['auth', 'verified', 'user'])->group(function(){
    Route::get('/user', [UserController::class, 'userDashboard'])->name('user');

       Route::get('/user/my-media', function () {
        return null; view('user.my-media');
    })->name('my-media');
});

//ADMIN ROUTE
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'adminDashboard'])->name('admin');   

    Route::get('/admin/manage-media', function () {
        return null; view('admin.manage-media');
    })->name('manage-media');

    Route::get('/admin/report', function () {
        return null; view('admin.report');
    })->name('report');

    Route::get('/admin/manage-user', function () {
        return null; view('admin.manage-user');
    })->name('manage-user');

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
    
    // ADMIN ROUTE
    //Route::get('/admin', [AdminController::class, 'adminDashboard'])->name('admin');
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

    //User Route
    //Route::get('/user', [UserController::class, 'userDashboard'])->name('dashboard');
    Route::get('/dashboard/statement', [UserController::class, 'getStatementByMonth'])->name('dashboard.statement');
    Route::get('/statement/pdf', [UserController::class, 'exportStatementPdf'])->name('statement.pdf');
});


require __DIR__.'/auth.php';
