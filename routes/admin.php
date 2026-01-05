<?php

use App\Modules\SeoManager\Http\Controllers\SeoEntryController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])->group(function () {
    Route::resource('seo-manager', SeoEntryController::class);
});


