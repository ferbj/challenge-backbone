<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ApiService;

class ApiController extends Controller
{
    //call service zip code
    public function getZipCode(Request $request){
        try{
            return ApiService::getApiData($request);
        }catch(\Exception $e){
            return response()->json(['error'=> $e->getMessage()]);
        }


    }
}
