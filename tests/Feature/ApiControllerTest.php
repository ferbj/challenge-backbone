<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiControllerTest extends TestCase
{
    /**
     * return 404 index.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get('/');
        $response->assertStatus(404);
    }

    /*test api data and structure*/
    public function test_api_data_and_structure(){
        $this->withExceptionHandling();
        $code = 20174;
        $response = $this->json('GET','api/zip-codes/'.$code);
        $response->assertStatus(200);
        $this->assertNotEmpty($response);
        $response->assertJsonStructure([
          '*'=>
           'zip_code',
           'locality',
            'federal_entity'=> [
                'key',
                'name',
                'code'
            ],
            'settlements' => [[
                'key',
                'name',
                'settlement_type' => [
                    'name'
                ]
            ]],
            'municipality' =>[
                'key',
                'name'
            ]
        ]
       );
    }
    /*test api error 404*/
    public function test_api_error_404(){
        $this->withExceptionHandling();
        $code = 174;
        $response = $this->get('api/zip-codes/'.$code);
        $response->assertViewIs('errors.404');
        $this->assertNotEmpty($response);
    }

    /*test api error 500*/
    public function test_api_error_500(){
        $this->withExceptionHandling();
        $code = 'baoiu4';
        $response = $this->get('api/zip-codes/'.$code);
        $response->assertViewIs('errors.500');
        $this->assertNotEmpty($response);
       }
    }


