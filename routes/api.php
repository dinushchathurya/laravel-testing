<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\CompanyController;

Route::get('company', [CompanyController::class, 'getAllCompanies']);
Route::post('company', [CompanyController::class, 'createCompany']);
