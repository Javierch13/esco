<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Operador extends Model
{
    //
    protected $table = 'operadores';

    protected $primaryKey = 'id_operador';

    protected $fillable = ['id_operador','nombre'];


    public function scopeAllOperators($query)
    {
        $data = DB::table('operadores')
                  ->orderBy('id_operador','desc')
                  ->paginate(5);

        return $data;
    }
}
