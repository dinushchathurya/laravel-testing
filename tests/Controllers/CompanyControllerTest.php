<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{   
    /* check required for fields for create company */
    public function testRequiredFieldsForCompanyRegistration()
    {
        $this->json('POST', 'api/company', ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "errors" => [
                    "name" => ["The name field is required."],
                    "address" => ["The address field is required."],
                    "state" => ["The state field is required."],
                    "country" => ["The country field is required."],
                ]
            ]);
    }

    /* check successfull create company */
    public function testCompanyCreatedSuccessfully()
    {
        $data = [
            "name" => "Test Comapany",
            "address" => "Test Address",
            "state" => "Test State",
            "country" => "Test Country",
        ];

        $this->json('POST', 'api/company', $data)
            ->assertStatus(201)
            ->assertJson([
                "message" => "Company created successfully"
            ]);
    }
}
