<?php

use Illuminate\Support\Facades\Route;
use AdminKit\Infographics\UI\API\Controllers\InfographicController;

Route::get('/infographic', [InfographicController::class, 'showFirst']);
