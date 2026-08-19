<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\PropertyController;
use App\Http\Controllers\Website\CareerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\Admin\PropertyCategoryController;
use App\Http\Controllers\Admin\PropertyFeatureController;
use App\Http\Controllers\Admin\CareerController as AdminCareerController;
use App\Http\Controllers\Admin\CareerApplicationController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\WebsiteSettingController;

// ============================================
// Public Website Routes
// ============================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'contactSubmit'])->name('contact.submit');

// Properties
Route::prefix('properties')->name('properties.')->group(function () {
    Route::get('/', [PropertyController::class, 'index'])->name('index');
    Route::get('/{property:slug}', [PropertyController::class, 'show'])->name('show');
    Route::get('/category/{slug}', [PropertyController::class, 'category'])->name('category');
});

// Careers
Route::prefix('careers')->name('careers.')->group(function () {
    Route::get('/', [CareerController::class, 'index'])->name('index');
    Route::get('/{career:slug}', [CareerController::class, 'show'])->name('show');
    Route::post('/{career}/apply', [CareerController::class, 'apply'])->name('apply');
});

// ============================================
// Admin Routes
// ============================================
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Admin Login
    Route::get('/login', function () {
        return view('admin.auth.login');
    })->name('login');
    
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    
    // Protected Admin Routes
    Route::middleware(['auth', 'admin'])->group(function () {
        
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        
        // Users (requires manage_users permission)
        Route::resource('users', UserController::class);
        
        // Properties
        Route::resource('properties', AdminPropertyController::class);
        Route::post('properties/{property}/change-status', [AdminPropertyController::class, 'changeStatus'])->name('properties.change-status');
        
        // Categories
        Route::resource('property-categories', PropertyCategoryController::class);
        
        // Features
        Route::resource('property-features', PropertyFeatureController::class);
        
        // Careers
        Route::resource('careers', AdminCareerController::class);
        Route::post('careers/{career}/change-status', [AdminCareerController::class, 'changeStatus'])->name('careers.change-status');
        
        // Career Applications
        Route::get('career-applications', [CareerApplicationController::class, 'index'])->name('career-applications.index');
        Route::get('career-applications/{application}', [CareerApplicationController::class, 'show'])->name('career-applications.show');
        Route::put('career-applications/{application}', [CareerApplicationController::class, 'update'])->name('career-applications.update');
        Route::get('career-applications/{application}/download-cv', [CareerApplicationController::class, 'downloadCV'])->name('career-applications.download-cv');
        
        // Contact Messages
        Route::get('contact-messages', [ContactMessageController::class, 'index'])->name('contact-messages.index');
        Route::get('contact-messages/{message}', [ContactMessageController::class, 'show'])->name('contact-messages.show');
        Route::put('contact-messages/{message}', [ContactMessageController::class, 'update'])->name('contact-messages.update');
        Route::delete('contact-messages/{message}', [ContactMessageController::class, 'destroy'])->name('contact-messages.destroy');
        
        // Website Settings (Super Admin only)
        Route::get('website-settings', [WebsiteSettingController::class, 'index'])->name('website-settings.index');
        Route::put('website-settings', [WebsiteSettingController::class, 'update'])->name('website-settings.update');
    });
});