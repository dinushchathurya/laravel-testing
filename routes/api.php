<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\CompanyController;

Route::post('company', [CompanyController::class, 'createCompany']);
