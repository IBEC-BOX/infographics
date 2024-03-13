<?php

use AdminKit\Infographics\UI\API\Controllers\InfographicController;
use Illuminate\Support\Facades\Route;

Route::get('/infographic', [InfographicController::class, 'showFirst']);
