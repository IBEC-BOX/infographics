<?php

use Illuminate\Support\Facades\Route;
use AdminKit\Infographics\UI\API\Controllers\InfographicController;

Route::get('/infographics', [InfographicController::class, 'index']);
Route::get('/infographics/{id}', [InfographicController::class, 'show']);
