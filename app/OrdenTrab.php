<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrdenTrab extends Model
{
    //
    protected $table = 'ordentrab';

    protected $primaryKey = 'id_orden';

    protected $fillable = ['id_orden','fecha_creacion','fecha_asignacion',
    					   'fecha_ejecucion','id_tipo','id_operador','resultado','valor'];

    public function scopeAllOrdenes($query)
    {
        $data = DB::table('ordentrab')
        		  ->join('tipoorden', 'ordentrab.id_tipo', '=', 'tipoorden.id_tipo')
        		  ->join('operadores', 'ordentrab.id_operador', '=', 'operadores.id_operador')
				  ->select('ordentrab.*','tipoorden.nombre as tipo_orden', 'operadores.nombre as nombre_operador')
                  ->orderBy('id_orden','desc')
                  ->paginate(5);

        return $data;
    }
}
