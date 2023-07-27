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
namespace App\Requests\Admin\Damas;
use Illuminate\Foundation\Http\FormRequest;

class DamasRequest extends FormRequest
{
    public function rules()
    {
        return [
            "nombre_de_su_gineclogo"=>[
				"string",
				"nullable",
				"max:255"
			],
			"direccin_de_la_clnica"=>[
				"string",
				"nullable",
				"max:255"
			],
			"porque_asisti"=>[
				"string",
				"nullable",
				"max:255"
			]
        ];
    }
    public function attributes()
    {
        return [
            "nombre_de_su_gineclogo"=>"Nombre de su ginecólogo",
			"direccin_de_la_clnica"=>"Dirección de la clínica",
			"porque_asisti"=>"Porque asistió?"
        ];
    }
    
}