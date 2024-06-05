<?php

use App\Http\Controllers\TestFormController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
Route::post('/amo', [TestFormController::class, 'index'])->name('amo');

