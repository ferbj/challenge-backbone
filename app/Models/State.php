<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $primaryKey = 'c_state';
    protected $table='state';

    public function code_post(){
        return $this->belongsTo(CodePost::class,'fk_c_state');
    }
}
