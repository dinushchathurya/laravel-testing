<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Company;

class CompanyController extends Controller
{   
    /* get all companies */
    public function getAllCompanies()
    {
        $companies = Company::all();
        return response([ 
            'message' => 'Retrieved successfully'
        ], 200);
    }

    /* create company */
    public function createCompany(Request $request) 
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'state' => 'required',
            'country' => 'required',
        ]);

        if ($validator->fails()) {
            return response([
                'errors' => $validator->errors()
            ], 422);
        }

        $company = Company::create($data);

        return response([
            'message' => 'Company created successfully'
        ], 201);
    }
}
