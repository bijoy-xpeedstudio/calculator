<?php

use Illuminate\Support\Facades\Route;
use Bijoy\Math\Controllers\MathController;

Route::any('/math/index', [MathController::class, 'index'])->name('calculator.index');
