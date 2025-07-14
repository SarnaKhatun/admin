<?php
use App\Http\Controllers\DirectorDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/director/login', [DirectorDashboardController::class, 'login'])->name('director.login');
Route::post('/director/login-check', [DirectorDashboardController::class, 'loginCheck'])->name('director-login');




Route::middleware('auth:director')->group(function () {
    Route::prefix('director')->name('director.')->group(function () {
        Route::get('/dashboard', [DirectorDashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [DirectorDashboardController::class, 'directorProfileEdit'])->name('profile.edit');
        Route::post('/update-profile', [DirectorDashboardController::class, 'directorProfileUpdate'])->name('update-profile');
        Route::post('/update-password', [DirectorDashboardController::class, 'updatePassword'])->name('update-password');


        Route::get('/membership-account-list', [DirectorDashboardController::class, 'membershipList'])->name('membership-account');
        Route::get('/membership-account/{id}', [DirectorDashboardController::class, 'membershipView'])->name('membership-account.view');
        Route::get('/member-account-statements/{id}', [DirectorDashboardController::class, 'accountStatement'])->name('member-account-statement.view');

        Route::get('/membership-account-pdf', [DirectorDashboardController::class, 'exportMemberPDF'])->name('member-account.pdf'); //pdf download
        Route::get('/membership-account-view-pdf/{id}', [DirectorDashboardController::class, 'exportViewPDF'])->name('membership-account-view.pdf'); //pdf download
        Route::get('/membership-account-single-page-pdf', [DirectorDashboardController::class, 'downloadPDF'])->name('membership.single-page-download.pdf'); //single page pdf download
        Route::get('/member-statement-pdf/{id}', [DirectorDashboardController::class, 'exportStatementPDF'])->name('member-statement.pdf'); //pdf download
        Route::get('/single-page-member-statement-pdf/{id}', [DirectorDashboardController::class, 'statementDownloadPDF'])->name('single-page.member-statement.pdf'); //pdf download


        //subscription fee
        Route::get('/monthly-collection-list', [DirectorDashboardController::class, 'subscriptionFee'])->name('monthly-subscription-fees.index');
        Route::get('/monthly-collections/{id}', [DirectorDashboardController::class, 'subscriptionFeeShow'])->name('monthly-subscription-fees.show');

        Route::get('/monthly-collection-pdf', [DirectorDashboardController::class, 'exportPDF'])->name('monthly-subscription.pdf'); //pdf download
        Route::get('monthly-collection-single-page-pdf', [DirectorDashboardController::class, 'downloadFeePDF'])->name('monthly-collection.single-page-download.pdf'); //single page pdf download
        Route::get('/monthly-collection-ledger-pdf/{id}', [DirectorDashboardController::class, 'exportLedgerPDF'])->name('monthly-subscription-fee-ledger.pdf'); //pdf download

        Route::post('/logout', [DirectorDashboardController::class, 'logout'])->name('logout');
    });
});
