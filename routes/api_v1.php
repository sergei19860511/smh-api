<?php

use App\Http\Controllers\Api\v1\DataCatchController;
use Illuminate\Support\Facades\Route;

Route::get('/search/{sources}', [DataCatchController::class, 'get'])->name('search.sources');
Route::post('/{sources}/add', [DataCatchController::class, 'post'])->name('add.sources');
