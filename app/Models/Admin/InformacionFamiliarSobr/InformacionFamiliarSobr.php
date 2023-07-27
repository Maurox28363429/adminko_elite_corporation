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
namespace App\Models\Admin\InformacionFamiliarSobr;
use Illuminate\Database\Eloquent\Model;


class InformacionFamiliarSobr extends Model
{
    
    public $table = 'informacion_familiar_sobr';
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"casoslegales",
		"le_han_rechazado_alguna_poliza",
		"cambiar_1",
		"tiene_planes_de_viaje_cambiar",
		"de_ser_si_especifique",
		"alguna_vez_a_tenido_consulta_con_cambia",
		"cual_es_su_estatura",
		"cual_es_su_peso",
		"edad_de_su_madre",
		"edad_de_su_padre",
		"si_fallecieron_indique_la_cambiar",
		"cuantos_hermanos_y_hermanas_tiene",
		"edad_actual",
		"si_fallecieron_indique_la_edad_y_cambia",
		"tiene_mdico_de_cabecera",
		"brindenos_su_nombre_telfono_cambiar",
		"tiene_cicatrices",
		"indicar_dnde_y_cmo_fue_provocada",
		"tiene_alguna_condicin_de_salud",
		"explique",
		"ha_tenido_operaciones",
		"explique_1",
		"ha_sido_positivo_covid",
		"indique_fecha_y_sntomas",
		"se_ha_vacunado_contra_el_covid",
		"indique_fecha_y_tipo_de_vacuna",
    ];
    
    public function scopeStartSorting($query, $request)
    {
        if ($request->has('informacion_familiar_sobr_sort_by') && $request->informacion_familiar_sobr_sort_by) {
            if($request->informacion_familiar_sobr_direction == "desc"){
                $query->orderByDesc($request->informacion_familiar_sobr_sort_by);
            } else {
                $query->orderBy($request->informacion_familiar_sobr_sort_by);
            }
        } else {
            $query->orderByDesc("id");
        }
    }
	public function scopeStartSearch($query, $search)
    {
        if ($search) {
            $query->where("id","like","%".$search."%");
        }
    }
}