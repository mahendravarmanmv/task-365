<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CashfreeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\EmailOtpController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/signup', [RegisteredUserController::class, 'create'])->name('signup');
Route::post('/signup', [RegisteredUserController::class, 'store']);
Route::post('/check-phone-exists', [RegisteredUserController::class, 'checkPhoneExists'])->name('check.phone.exists');


Route::post('/send-otp-email', [EmailOtpController::class, 'sendOtp']);
Route::post('/verify-otp-email', [EmailOtpController::class, 'verifyOtp']);
Route::post('/check-email-exists', [EmailOtpController::class, 'checkEmail']);


Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot-password');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

// Show reset password form
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');

// Handle password reset request
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
    ->name('password.update');

Route::get('/blog', function () {
    return view('blogs');
})->name('blog');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about');

Route::get('/contact-us', fn() => view('contact-us'))->name('contact');
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/refund-policy', function () {
    return view('refund-policy');
})->name('refund-policy');

Route::get('/terms', function () {
    return view('terms-conditions');
})->name('terms');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/shipping', function () {
    return view('shipping');
})->name('shipping');

Route::get('/registration-success', function () {
    return view('auth.registration-success');
})->name('registration.success');

Route::get('/category-details', function () {
    return view('category-details');
})->name('category-details');

Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
	Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('throttle:6,1')->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/dashboard');
    })->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['throttle:6,1'])->name('verification.send');

    
	Route::get('/leads/{lead}', [LeadController::class, 'show'])->name('leads.show');
    Route::get('/leads/{lead}/payment', [LeadController::class, 'payment'])->name('leads.payment');

    Route::post('/payment/create', [PaymentController::class, 'createOrder'])->name('payment.create');
    Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::post('/payment/webhook', [PaymentController::class, 'webhook'])->name('payment.webhook');

    Route::get('/payment/result', [PaymentController::class, 'result'])->name('payment.result');
    Route::post('/cashfree/payments/store', [CashfreeController::class, 'payment'])->name('cashfree.payment');
    Route::any('/cashfree/payments/success', [CashfreeController::class, 'success'])->name('cashfree.success');

    Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->middleware('auth')->name('wishlist.toggle');
    Route::get('/wishlist', [WishlistController::class, 'index'])->middleware('auth')->name('wishlist.index');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
    Route::get('/change-password', [ProfileController::class, 'showChangePasswordForm'])->name('change.password.form');
    Route::post('/change-password', [ProfileController::class, 'updatePassword'])->name('change.password.update');


});

/*require __DIR__.'/auth.php';*/
