<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TipoOrden extends Model
{
    //
    protected $table = 'tipoorden';

    protected $primaryKey = 'id_tipo';

    protected $fillable = ['id_tipo','nombre'];

    public function scopeAllTipos($query)
    {
        $data = DB::table('tipoorden')
                  ->orderBy('id_tipo','desc')
                  ->paginate(5);

        return $data;
    }
}
