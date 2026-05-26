<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Login;
use App\Livewire\Admin\Pages\Index as PagesIndex;
use App\Livewire\Admin\Pages\Edit as PagesEdit;
use App\Livewire\Admin\Services\Index as ServicesIndex;
use App\Livewire\Admin\Services\Create as ServicesCreate;
use App\Livewire\Admin\Services\Edit as ServicesEdit;
use App\Livewire\Admin\Packages\Index as PackagesIndex;
use App\Livewire\Admin\Packages\Create as PackagesCreate;
use App\Livewire\Admin\Packages\Edit as PackagesEdit;
use App\Livewire\Admin\Packages\Categories as PackagesCategories;
use App\Livewire\Admin\Portfolio\Index as PortfolioIndex;
use App\Livewire\Admin\Portfolio\Create as PortfolioCreate;
use App\Livewire\Admin\Portfolio\Edit as PortfolioEdit;
use App\Livewire\Admin\About;
use App\Livewire\Admin\Testimonials as AdminTestimonials;
use App\Livewire\Admin\Contact as AdminContact;

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected)
|--------------------------------------------------------------------------
|
| These routes are for admin panel access using Livewire components.
|
*/

// Auth Routes (Public)
Route::prefix('admin')->group(function () {
    Route::get('/login', Login::class)->name('login')->middleware('guest');
    Route::post('/logout', function () {
        \Illuminate\Support\Facades\Auth::logout();
        return redirect()->route('login');
    })->name('logout')->middleware('auth');
});

// Protected Routes (Require Auth)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/', Dashboard::class)->name('admin.dashboard');

    // About Page Management
    Route::get('/about', About::class)->name('admin.about');

    // Testimonials Management
    Route::get('/testimonials', AdminTestimonials::class)->name('admin.testimonials');

    // Contact Settings
    Route::get('/contact', AdminContact::class)->name('admin.contact');

    // Pages Management
    Route::get('/pages', PagesIndex::class)->name('admin.pages.index');
    Route::get('/pages/{id}/edit', PagesEdit::class)->name('admin.pages.edit');

    // Services Management
    Route::get('/services', ServicesIndex::class)->name('admin.services.index');
    Route::get('/services/create', ServicesCreate::class)->name('admin.services.create');
    Route::get('/services/{service}/edit', ServicesEdit::class)->name('admin.services.edit');

    // Packages/Pricing Management
    Route::get('/packages', PackagesIndex::class)->name('admin.packages.index');
    Route::get('/packages/create', PackagesCreate::class)->name('admin.packages.create');
    Route::get('/packages/categories', PackagesCategories::class)->name('admin.packages.categories');
    Route::get('/packages/{package}/edit', PackagesEdit::class)->name('admin.packages.edit');

    // Portfolio Management
    Route::get('/portfolio', PortfolioIndex::class)->name('admin.portfolio.index');
    Route::get('/portfolio/create', PortfolioCreate::class)->name('admin.portfolio.create');
    Route::get('/portfolio/{portfolio}/edit', PortfolioEdit::class)->name('admin.portfolio.edit');
});
