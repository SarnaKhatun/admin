<?php

use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\AccountController;
use App\Http\Controllers\Backend\CareerController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DirectorController;
use App\Http\Controllers\Backend\ExpenseController;
use App\Http\Controllers\Backend\ExpenseHeadController;
use App\Http\Controllers\Backend\ExpenseSubHeadContrller;
use App\Http\Controllers\Backend\InvestmentController;
use App\Http\Controllers\Backend\MemberAccountStatementController;
use App\Http\Controllers\Backend\MembershipAccountController;
use App\Http\Controllers\Backend\MissionVisionController;
use App\Http\Controllers\Backend\MonthlySubscriptionFeeController;
use App\Http\Controllers\Backend\PackageController;
use App\Http\Controllers\Backend\PaymentMethodController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ProvidentFundController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\SearchController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\WithdrawController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionModuleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\ServiceCategoryController;
use App\Http\Controllers\Backend\SiteSettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::get('/', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::controller(SliderController::class)->prefix('slider')->group(function () {
       Route::get('/', 'index')->name('slider.index');
       Route::get('/create', 'create')->name('slider.create');
       Route::post('/store', 'store')->name('slider.store');
       Route::get('/status-update/{id}', 'statusChange')->name('slider.status-change');
       Route::get('/edit/{id}', 'edit')->name('slider.edit');
       Route::post('/update/{id}', 'update')->name('slider.update');
       Route::post('/delete/{id}', 'delete')->name('slider.delete');
    });
    Route::controller(AboutUsController::class)->group(function() {
       Route::get('/about-us/edit', 'edit')->name('about-us.edit');
       Route::post('/about-us/update', 'update')->name('about-us.update');
    });

    Route::controller(CareerController::class)->group(function() {
       Route::get('/careers/edit', 'edit')->name('careers.edit');
       Route::post('/careers/update', 'update')->name('careers.update');
    });


    Route::controller(MissionVisionController::class)->group(function() {
        Route::get('/mission-vision/edit', 'edit')->name('mission-vision.edit');
        Route::post('/mission-vision/update', 'update')->name('mission-vision.update');
    });


    Route::controller(SiteSettingController::class)->group(function() {
        Route::get('/site-settings/edit', 'edit')->name('site-settings.edit');
        Route::post('/site-settings/update', 'update')->name('site-settings.update');
    });

    Route::controller(ServiceCategoryController::class)->prefix('service-category')->group(function () {
        Route::get('/', 'index')->name('service-category.index');
        Route::get('/create', 'create')->name('service-category.create');
        Route::post('/store', 'store')->name('service-category.store');
        Route::get('/edit/{id}', 'edit')->name('service-category.edit');
        Route::post('/update/{id}', 'update')->name('service-category.update');
        Route::post('/delete/{id}', 'delete')->name('service-category.delete');
    });

    Route::controller(ServiceController::class)->prefix('service')->group(function () {
        Route::get('/', 'index')->name('service.index');
        Route::get('/create', 'create')->name('service.create');
        Route::post('/store', 'store')->name('service.store');
        Route::get('/status-update/{id}', 'statusChange')->name('service.status-change');
        Route::get('/edit/{id}', 'edit')->name('service.edit');
        Route::post('/update/{id}', 'update')->name('service.update');
        Route::post('/delete/{id}', 'delete')->name('service.delete');
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
});



require __DIR__ . '/auth.php';
