<?php
namespace App\Http\Services;

use Exception;
use App\Models\CodePost;
use Illuminate\Support\Str;
use App\Models\MunicplCodepst;

class ApiService{

    public static function getApiData($request){
        $codigo = $request->zip_code;
        if(preg_match('/[a-zA-Z]/',$codigo)){
            return view('errors.500');
        }
        try{
        $codeszip = CodePost::with(['states','settlements'])
                ->where('id_code_post', $codigo)
                ->get();

            $municipality = MunicplCodepst::where('fk_id_code_post', $codigo)->firstOrFail();
            $data = [];
                foreach ($codeszip as $code) {
                    $data = [
                            "zip_code" => Str::padLeft($code->id_code_post, 5, "0"),
                            "locality" => Str::ascii(Str::upper($code->d_city)),
                            "federal_entity" => [
                                "key" => $code->fk_c_state,
                                "name"=> Str::ascii(Str::upper($code->states->d_state)),
                                "code"=> $code->states->c_cp,
                            ]
                        ];
                    foreach ($code->settlements as $settlements) {
                        $data["settlements"][] = [
                            "key" => $settlements->id_settlement,
                            "name" => Str::ascii(Str::upper($settlements->d_settlement)),
                            "zone_type" => Str::ascii(Str::upper($settlements->d_zone)),
                            "settlement_type"=> [
                                "name" => $settlements->d_type_settle
                            ]
                        ];
                    }

                        $data["municipality"] = [
                            "key" => $municipality->fk_municipality_id,
                            "name" => Str::ascii(Str::upper($municipality->fk_d_municipality))
                    ];

                }
                return response()->json($data, 200);
        }catch(Exception $e){
            return view('errors.404');
        }
    }
}


