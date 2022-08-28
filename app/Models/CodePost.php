<?php

namespace App\Models;

use App\Models\State;
use App\Models\Settlement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CodePost extends Model
{
    use HasFactory;
    protected $primaryKey='id_code_post';
    protected $table='code_post';

    public function states(){
        return $this->belongsTo(State::class,'fk_c_state');
    }
    public function settlements(){
        return $this->hasMany(Settlement::class,'fk_id_code_post');
    }

}
