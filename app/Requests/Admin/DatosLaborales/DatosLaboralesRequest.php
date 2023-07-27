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
namespace App\Requests\Admin\DatosLaborales;
use Illuminate\Foundation\Http\FormRequest;

class DatosLaboralesRequest extends FormRequest
{
    public function rules()
    {
        return [
            "nombre_de_la_empresa_donde_labora"=>[
				"string",
				"nullable",
				"max:255"
			],
			"direccin_de_la_empresa"=>[
				"string",
				"nullable",
				"max:255"
			],
			"antigedad_en_la_empresa_u_ocupacin"=>[
				"string",
				"nullable",
				"max:255"
			],
			"cargo_dentro_de_la_empresa"=>[
				"string",
				"nullable",
				"max:255"
			],
			"ingreso_mensual"=>[
				"string",
				"nullable",
				"max:255"
			],
			"de_cuanto_es_su_patrimonio"=>[
				"string",
				"nullable",
				"max:255"
			]
        ];
    }
    public function attributes()
    {
        return [
            "nombre_de_la_empresa_donde_labora"=>"Nombre de la empresa donde labora",
			"direccin_de_la_empresa"=>"Dirección de la empresa",
			"antigedad_en_la_empresa_u_ocupacin"=>"Antigüedad en la empresa u ocupación",
			"cargo_dentro_de_la_empresa"=>"Cargo dentro de la empresa",
			"ingreso_mensual"=>"Ingreso mensual",
			"de_cuanto_es_su_patrimonio"=>"De cuanto es su patrimonio?"
        ];
    }
    
}