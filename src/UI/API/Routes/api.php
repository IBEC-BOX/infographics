<?php

use AdminKit\Infographics\UI\API\Controllers\InfographicController;
use Illuminate\Support\Facades\Route;

Route::get('/infographics', [InfographicController::class, 'index']);
Route::get('/infographics/{id}', [InfographicController::class, 'show']);
