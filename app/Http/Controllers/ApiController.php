<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ApiService;
use Illuminate\Support\Facades\Cache;

class ApiController extends Controller
{
    //call service zip code
    public function getZipCode(Request $request){
        try{
            //cache query
            if(Cache::has('response')){
                return Cache::get('response');
            }
            $response=ApiService::getApiData($request);
            Cache::put('response',$response,20);
            return $response;
        }catch(\Exception $e){
            return response()->json(['error'=> $e->getMessage()]);
        }


    }
}
