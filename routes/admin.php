<?php

use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\LoginScreenController;
use App\Http\Controllers\Admin\SplashScreenController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\IntroductionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\SocialShareController;
use App\Http\Controllers\Admin\FloatingMenuController;
use App\Http\Controllers\Admin\AppController;

Route::get('settings', [SettingController::class, 'index'])->name('admin.settings');
Route::post('setting_save', [SettingController::class, 'save'])->name('admin.settings.save');
Route::post('save_general_settings', [SettingController::class, 'save_general_settings'])->name('admin.settings.save_general_settings');
Route::get('setting/smtp', [SettingController::class,'smtpindex'])->name('admin.settings.smtp_index');
Route::post('setting/smtp', [SettingController::class,'smtp'])->name('admin.settings_smtp.save');

Route::get('login-screen', [LoginScreenController::class, 'index'])->name('admin.login_screen');
Route::post('login_screen_save', [LoginScreenController::class, 'save'])->name('admin.login_screen.save');

Route::get('splash-screen', [SplashScreenController::class, 'index'])->name('admin.splash_screen');
Route::get('splash-screen-add', [SplashScreenController::class, 'add'])->name('admin.splash_screen.add');
Route::post('splash-screen-save', [SplashScreenController::class, 'save'])->name('admin.splash_screen.save');
Route::get('splash-screen-edit/{id}', [SplashScreenController::class, 'edit'])->name('admin.splash_screen.edit');
Route::get('splash-screen-delete/{id}', [SplashScreenController::class, 'delete'])->name('admin.splash_screen.delete');

Route::get('menu', [MenuController::class, 'index'])->name('admin.menu');
Route::get('menu-add', [MenuController::class, 'add'])->name('admin.menu.add');
Route::post('menu-save', [MenuController::class, 'save'])->name('admin.menu.save');
Route::get('menu-edit/{id}', [MenuController::class, 'edit'])->name('admin.menu.edit');
Route::get('menu-delete/{id}', [MenuController::class, 'delete'])->name('admin.menu.delete');

Route::get('introduction', [IntroductionController::class, 'index'])->name('admin.introduction');
Route::get('introduction-add', [IntroductionController::class, 'add'])->name('admin.introduction.add');
Route::post('introduction-save', [IntroductionController::class, 'save'])->name('admin.introduction.save');
Route::get('introduction-edit/{id}', [IntroductionController::class, 'edit'])->name('admin.introduction.edit');
Route::get('introduction-delete/{id}', [IntroductionController::class, 'delete'])->name('admin.introduction.delete');

Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('users', [UserController::class, 'index'])->name('admin.users');
Route::get('users-delete/{id}', [UserController::class, 'delete'])->name('admin.users.delete');
Route::post('change_password', [UserController::class, 'changePassword'])->name('admin.change_password');
Route::post('notification', [SettingController::class, 'notification'])->name('admin.notification');

Route::get('messages', [MessagesController::class, 'index'])->name('admin.messages');
Route::get('messages-add', [MessagesController::class, 'add'])->name('admin.messages.add');
Route::post('messages-save', [MessagesController::class, 'save'])->name('admin.messages.save');
Route::get('messages-delete/{id}', [MessagesController::class, 'delete'])->name('admin.messages.delete');

Route::get('social-share', [SocialShareController::class, 'index'])->name('admin.social_share');
Route::get('social-share-add', [SocialShareController::class, 'add'])->name('admin.social_share.add');
Route::post('social-share-save', [SocialShareController::class, 'save'])->name('admin.social_share.save');
Route::get('social-share-edit/{id}', [SocialShareController::class, 'edit'])->name('admin.social_share.edit');
Route::get('social-share-delete/{id}', [SocialShareController::class, 'delete'])->name('admin.social_share.delete');

Route::get('floating-menu', [FloatingMenuController::class, 'index'])->name('admin.floating_menu');
Route::post('floating-menu-save', [FloatingMenuController::class, 'save'])->name('admin.floating_menu.save');


Route::get('app', [AppController::class, 'index'])->name('admin.app');
Route::get('app-add', [AppController::class, 'add'])->name('admin.app.add');
Route::post('app-save', [AppController::class, 'save'])->name('admin.app.save');
Route::get('app-edit/{id}', [AppController::class, 'edit'])->name('admin.app.edit');
Route::get('app-delete/{id}', [AppController::class, 'delete'])->name('admin.app.delete');
Route::get('app-select/{app_key}', [AppController::class, 'appSelect'])->name('admin.app.select');

