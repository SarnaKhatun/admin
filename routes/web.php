<?php

use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\MembershipAccountController;
use App\Http\Controllers\Backend\MonthlySubscriptionFeeController;
use App\Http\Controllers\Backend\WithdrawController;
use App\Http\Controllers\Backend\DirectorController;
use App\Http\Controllers\Backend\PackageController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AccountController;
use App\Http\Controllers\Backend\PaymentMethodController;
use App\Http\Controllers\Backend\MemberAccountStatementController;
use App\Http\Controllers\Backend\ExpenseHeadController;
use App\Http\Controllers\Backend\ExpenseSubHeadContrller;
use App\Http\Controllers\Backend\ExpenseController;
use App\Http\Controllers\Backend\ProvidentFundController;
use App\Http\Controllers\Backend\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionModuleController;
use App\Http\Controllers\Backend\SearchController;
use App\Http\Controllers\Backend\InvestmentController;
use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\CareerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::get('/', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::controller(SliderController::class)->group(function () {
       Route::get('/slider', 'index')->name('slider.index');
       Route::get('/create', 'create')->name('slider.create');
       Route::post('/store', 'store')->name('slider.store');
       Route::get('/slider-status-update/{id}', 'statusChange')->name('slider.status-change');
       Route::get('/slider-edit/{id}', 'edit')->name('slider.edit');
       Route::post('/slider-update/{id}', 'update')->name('slider.update');
       Route::post('/slider-delete/{id}', 'delete')->name('slider.delete');
    });
    Route::controller(AboutUsController::class)->group(function() {
       Route::get('/about-us/edit', 'edit')->name('about-us.edit');
       Route::post('/about-us/update', 'update')->name('about-us.update');
    });

    Route::controller(CareerController::class)->group(function() {
       Route::get('/careers/edit', 'edit')->name('careers.edit');
       Route::post('/careers/update', 'update')->name('careers.update');
    });

    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);

    Route::resource('permission-modules', PermissionModuleController::class);
    Route::get('permission-modules/{permissionModuleId}/delete', [PermissionModuleController::class, 'destroy']);

    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);

    Route::resource('users', UserController::class);
    Route::get('users/{userId}/delete', [UserController::class, 'destroy']);


    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/user-update-password', [ProfileController::class, 'updatePassword'])->name('user.update-password');

    // Global Search
    Route::post('/global-search', [SearchController::class, 'search'])->name('global.search');


    // Customer or Client
    Route::resource('clients', CustomerController::class);
    Route::get('/client-all-statement', [CustomerController::class, 'allStatement'])->name('clients.statement-all');
    Route::get('/client-statements/{id}', [CustomerController::class, 'clientStatement'])->name('clients.all-statement');
    Route::get('/client-statement-pdf/{id}', [CustomerController::class, 'exportClientStatementPDF'])->name('clients.all-statement.pdf'); //all statement pdf download
    Route::get('/client-single-page-statement-pdf/{id}', [CustomerController::class, 'clientStatementDownload'])->name('clients.single-page.all-statement.pdf'); //single page statement pdf download



    Route::get('/clients-pdf', [CustomerController::class, 'exportPDF'])->name('customer-download.pdf'); //pdf download
    Route::get('/clients-single-page-pdf', [CustomerController::class, 'downloadPDF'])->name('client.single-page-download.pdf'); //single page pdf download

    Route::get('/exportclient', [CustomerController::class, 'exportclient'])->name('exportclient'); // client csv


    Route::get('/get-thanas', [CustomerController::class, 'getThanas'])->name('getThanas'); //get thanas



});



require __DIR__ . '/auth.php';
