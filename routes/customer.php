<?php

use App\Http\Controllers\CustomerDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/client/login', [CustomerDashboardController::class, 'login'])->name('customer.login');
Route::post('/client/login-check', [CustomerDashboardController::class, 'loginCheck'])->name('customer-login');




Route::middleware('auth:customer')->group(function () {
    Route::prefix('client')->name('customer.')->group(function () {
        Route::get('/dashboard', [CustomerDashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [CustomerDashboardController::class, 'customerProfileEdit'])->name('profile.edit');
        Route::post('/update-profile', [CustomerDashboardController::class, 'customerProfileUpdate'])->name('update-profile');
        Route::post('/update-password', [CustomerDashboardController::class, 'updatePassword'])->name('update-password');


        Route::get('/membership-account-list', [CustomerDashboardController::class, 'membershipList'])->name('membership-account');
        Route::get('/membership-account/{id}', [CustomerDashboardController::class, 'membershipView'])->name('membership-account.view');
        Route::get('/member-account-statements/{id}', [CustomerDashboardController::class, 'accountStatement'])->name('member-account-statement.view');
        Route::get('/statements/{id}', [CustomerDashboardController::class, 'clientStatement'])->name('all-statement');
        Route::get('/statement-pdf/{id}', [CustomerDashboardController::class, 'exportClientStatementPDF'])->name('all-statement.pdf'); //all statement pdf download
        Route::get('/single-page-statement-pdf/{id}', [CustomerDashboardController::class, 'clientStatementDownload'])->name('single-page.all-statement.pdf'); //single page statement pdf download




        Route::get('/membership-account-pdf', [CustomerDashboardController::class, 'exportMemberPDF'])->name('member-account.pdf'); //pdf download
        Route::get('/membership-account-view-pdf/{id}', [CustomerDashboardController::class, 'exportViewPDF'])->name('membership-account-view.pdf'); //pdf download
        Route::get('/membership-account-single-page-pdf', [CustomerDashboardController::class, 'downloadPDF'])->name('membership.single-page-download.pdf'); //single page pdf download

        Route::get('/member-statement-pdf/{id}', [CustomerDashboardController::class, 'exportStatementPDF'])->name('member-statement.pdf'); //pdf download
        Route::get('/single-page-member-statement-pdf/{id}', [CustomerDashboardController::class, 'statementDownloadPDF'])->name('single-page.member-statement.pdf'); //pdf download




        //subscription fee
        Route::get('/monthly-collection-list', [CustomerDashboardController::class, 'subscriptionFee'])->name('monthly-subscription-fees.index');
        Route::get('/monthly-collections/{id}', [CustomerDashboardController::class, 'subscriptionFeeShow'])->name('monthly-subscription-fees.show');


        Route::get('/monthly-collection-pdf', [CustomerDashboardController::class, 'exportPDF'])->name('monthly-subscription.pdf'); //pdf download
        Route::get('monthly-collection-single-page-pdf', [CustomerDashboardController::class, 'downloadFeePDF'])->name('monthly-collection.single-page-download.pdf'); //single page pdf download
        Route::get('/monthly-collection-ledger-pdf/{id}', [CustomerDashboardController::class, 'exportLedgerPDF'])->name('monthly-subscription-fee-ledger.pdf'); //pdf download




        Route::post('/logout', [CustomerDashboardController::class, 'logout'])->name('logout');
    });
});



