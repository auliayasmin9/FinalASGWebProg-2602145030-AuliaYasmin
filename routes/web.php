<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ChatController;


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::middleware('auth')->get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile');

Route::get('/payment', [PaymentController::class, 'show'])->name('payment');
Route::post('/payment', [PaymentController::class, 'process'])->name('payment.process');
Route::post('/payment/store-balance', [PaymentController::class, 'storeBalance'])->name('payment.storeBalance');

Route::post('/friend/{friendId}/add', [FriendController::class, 'addFriend'])->name('friend.add');
Route::post('/friend/{friendId}/remove', [FriendController::class, 'removeFriend'])->name('friend.remove');

Route::get('/messages/{receiverId}', [MessageController::class, 'showMessages'])->name('messages.show');
Route::post('/messages/{receiverId}/send', [MessageController::class, 'sendMessage'])->name('message.send');

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::middleware('auth')->get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::middleware('auth')->post('/notifications/{notificationId}/read', [NotificationController::class, 'markAsRead']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
