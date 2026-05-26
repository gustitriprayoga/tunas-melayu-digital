<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\About; // Pastikan component ini dibuat nanti
use App\Livewire\Contact;
use App\Livewire\Services\Index as ServiceIndex;
use App\Livewire\Services\Show as ServiceShow;
use App\Livewire\Portfolio\Index as PortfolioIndex;
use App\Livewire\Portfolio\Show as PortfolioShow;
use App\Livewire\Pricing;
use App\Livewire\Testimonials;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ini adalah rute untuk halaman frontend (publik).
| Kita menggunakan Livewire Component langsung sebagai controller.
|
*/

// Halaman Utama
Route::get('/', Home::class)->name('home');

// Halaman Statis
Route::get('/about', About::class)->name('about');
Route::get('/contact', Contact::class)->name('contact');

// Halaman Layanan (Services)
Route::group(['prefix' => 'services'], function () {
    // List semua layanan (/services)
    Route::get('/', ServiceIndex::class)->name('services.index');

    // Detail layanan (/services/web-development)
    Route::get('/{slug}', ServiceShow::class)->name('services.show');
});

// Halaman Portfolio (Projects)
Route::group(['prefix' => 'portfolio'], function () {
    // List semua project (/portfolio)
    Route::get('/', PortfolioIndex::class)->name('portfolio.index');

    // Detail project (/portfolio/sistem-akademik)
    Route::get('/{slug}', PortfolioShow::class)->name('portfolio.show');
});

Route::get('/pricing', Pricing::class)->name('pricing');

Route::get('/testimonials', Testimonials::class)->name('testimonials');
