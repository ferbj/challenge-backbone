<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
    /*test rate_limit 500*/
    public function test_rate_limit_500(){
        $i=0;
        $this->withExceptionHandling();
        $start_time = microtime(true);
        while($i<=500){
            $code = random_int(1000,98000);
            //$response = $this->json('GET','api/zip-codes/'.$code);
            $response = Http::get('http://127.0.0.1:8000/api/zip-codes/'.$code);
            //$response->assertStatus(200);
            $response->ok();
            $this->assertNotEmpty($response);
            echo '/api/zip-codes/'.$code . "\n";
            $i++;
        }
        // Get the difference between start and end in microseconds, as a float value
        $diff = microtime(true) - $start_time;
        $sec = intval($diff);
        $micro = round($diff - $sec,3);
        echo ($micro / 1000) .' ms';
    }
    }


