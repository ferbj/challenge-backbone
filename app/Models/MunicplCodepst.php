<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MunicplCodepst extends Model
{
    use HasFactory;
    protected $primaryKey= 'fk_id_code_post';
    protected $table = 'municipality_codepost';


}
