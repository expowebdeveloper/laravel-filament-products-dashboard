<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return ['Laravel' => app()->version()];
    return redirect()->route('filament.admin.pages.dashboard');
});

require __DIR__.'/auth.php';
