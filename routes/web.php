<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('/about-pamoja', [FrontendController::class, 'about'])->name('about');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
    Route::get('/services', [FrontendController::class, 'services'])->name('services');
    Route::get('/properties', [FrontendController::class, 'properties'])->name('properties');
    Route::get('/properties/{slug}', [FrontendController::class, 'single'])->name('properties.show');
    Route::get('/categories/{slug}', [FrontendController::class, 'category'])->name('categories.show');
  
Route::post('/contact/send', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');






Route::middleware(['auth', 'verified', 'pwc'])->group(function () {

    Route::get('/pamoja/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('properties', PropertyController::class);
        Route::delete('properties/{property}/gallery/{media}', [PropertyController::class, 'removeGalleryImage'])
            ->name('properties.gallery.remove');
        Route::post('properties/{property}/gallery', [PropertyController::class, 'addGalleryImage'])
            ->name('properties.gallery.add');

            Route::get('properties/{property}/featured', [PropertyController::class, 'toggleFeatured'])
    ->name('properties.toggleFeatured');


        Route::resource('categories', CategoryController::class);
        Route::resource('users', UserController::class);

    });


});

Route::middleware(['auth', 'verified',])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
