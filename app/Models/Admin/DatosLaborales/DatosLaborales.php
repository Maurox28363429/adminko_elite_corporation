<?php
/**
* @author Admiko
* @copyright Copyright (c) Admiko
* @link https://admiko.com
* @Help We are committed to delivering the best code quality and user experience. If you have suggestions or find any issues, please don't hesitate to contact us. Thank you.
* This file is managed by Admiko and is not recommended to be modified.
* Any custom code should be added elsewhere to avoid losing changes during updates.
* However, in case your code is overwritten, you can always restore it from a backup folder.
*/
namespace App\Models\Admin\DatosLaborales;
use Illuminate\Database\Eloquent\Model;


class DatosLaborales extends Model
{
    
    public $table = 'datos_laborales';
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"nombre_de_la_empresa_donde_labora",
		"direccin_de_la_empresa",
		"antigedad_en_la_empresa_u_ocupacin",
		"cargo_dentro_de_la_empresa",
		"ingreso_mensual",
		"de_cuanto_es_su_patrimonio",
    ];
    
    public function scopeStartSorting($query, $request)
    {
        if ($request->has('datos_laborales_sort_by') && $request->datos_laborales_sort_by) {
            if($request->datos_laborales_direction == "desc"){
                $query->orderByDesc($request->datos_laborales_sort_by);
            } else {
                $query->orderBy($request->datos_laborales_sort_by);
            }
        } else {
            $query->orderByDesc("id");
        }
    }
	public function scopeStartSearch($query, $search)
    {
        if ($search) {
            $query->where("nombre_de_la_empresa_donde_labora","like","%".$search."%")
			->orWhere("cargo_dentro_de_la_empresa","like","%".$search."%");
        }
    }
}