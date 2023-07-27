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
namespace App\Requests\Admin\InformacionFamiliarSobr;
use Illuminate\Foundation\Http\FormRequest;

class InformacionFamiliarSobrRequest extends FormRequest
{
    public function rules()
    {
        return [
            "de_ser_si_especifique"=>[
				"string",
				"nullable",
				"max:255"
			],
			"cual_es_su_estatura"=>[
				"integer",
				"min:-2147483648",
				"max:2147483647",
				"nullable"
			],
			"cual_es_su_peso"=>[
				"integer",
				"min:-2147483648",
				"max:2147483647",
				"nullable"
			],
			"edad_de_su_madre"=>[
				"integer",
				"min:-2147483648",
				"max:2147483647",
				"nullable"
			],
			"edad_de_su_padre"=>[
				"integer",
				"min:-2147483648",
				"max:2147483647",
				"nullable"
			],
			"si_fallecieron_indique_la_cambiar"=>[
				"string",
				"nullable",
				"max:255"
			],
			"cuantos_hermanos_y_hermanas_tiene"=>[
				"integer",
				"min:-2147483648",
				"max:2147483647",
				"nullable"
			],
			"edad_actual"=>[
				"string",
				"nullable",
				"max:255"
			],
			"si_fallecieron_indique_la_edad_y_cambia"=>[
				"string",
				"nullable",
				"max:255"
			],
			"brindenos_su_nombre_telfono_cambiar"=>[
				"string",
				"nullable",
				"max:255"
			],
			"indicar_dnde_y_cmo_fue_provocada"=>[
				"string",
				"nullable",
				"max:255"
			],
			"explique"=>[
				"string",
				"nullable",
				"max:255"
			],
			"explique_1"=>[
				"string",
				"nullable",
				"max:255"
			],
			"indique_fecha_y_sntomas"=>[
				"string",
				"nullable",
				"max:255"
			],
			"indique_fecha_y_tipo_de_vacuna"=>[
				"string",
				"nullable",
				"max:255"
			]
        ];
    }
    public function attributes()
    {
        return [
            "de_ser_si_especifique"=>"De ser si, especifique",
			"cual_es_su_estatura"=>"Cual es su estatura?",
			"cual_es_su_peso"=>"Cual es su peso?",
			"edad_de_su_madre"=>"Edad de su madre?",
			"edad_de_su_padre"=>"Edad de su padre?",
			"si_fallecieron_indique_la_cambiar"=>"Si fallecieron indique la (cambiar)",
			"cuantos_hermanos_y_hermanas_tiene"=>"Cuantos hermanos y hermanas tiene?",
			"edad_actual"=>"Edad actual?",
			"si_fallecieron_indique_la_edad_y_cambia"=>"Si fallecieron indique la edad y (cambia",
			"brindenos_su_nombre_telfono_cambiar"=>"Brindenos su nombre, teléfono (cambiar)",
			"indicar_dnde_y_cmo_fue_provocada"=>"Indicar dónde y cómo fue provocada",
			"explique"=>"Explique",
			"explique_1"=>"Explique",
			"indique_fecha_y_sntomas"=>"Indique fecha y síntomas",
			"indique_fecha_y_tipo_de_vacuna"=>"Indique fecha y tipo de vacuna"
        ];
    }
    
}