<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// Route::get('/register', [RegisteredUserController::class, 'create'])
//                 ->middleware('guest')
//                 ->name('register');

Route::get('/inscription', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register-fr');

Route::get('/registrierung', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register-de');

Route::get('/registering', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register-en');

Route::get('/registreieren', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register-lu');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest')
                ->name('register');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::get('/log-in', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login-en');

Route::get('/connexion', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login-fr');

Route::get('/aloggen', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login-lu');

Route::get('/anmeldung', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login-de');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest')
                ->name('login.connect');

// Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
//                 ->middleware('guest')
//                 ->name('password.request');

Route::get('/mot-de-passe-oublie', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request-fr');

Route::get('/forgotten-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request-en');

Route::get('/passwort-vergessen', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request-de');

Route::get('/passwuert-vergiess', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request-lu');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

Route::get('/reinitialisation-mot-de-passe/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset-fr');

Route::get('/password-restore/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset-en');

Route::get('/passwort-wiederherstellen/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset-de');

Route::get('/passwuert-restaureieren/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset-lu');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
