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
namespace App\Requests\Admin\DatosPersonales;
use Illuminate\Foundation\Http\FormRequest;

class DatosPersonalesRequest extends FormRequest
{
    public function rules()
    {
        return [
            "direccin_residencial"=>[
				"string",
				"nullable",
				"max:255"
			],
			"telfono_residencial"=>[
				"integer",
				"min:-2147483648",
				"max:2147483647",
				"nullable"
			],
			"correo_electrnico"=>[
				"email:filter",
				"nullable",
				"max:100"
			],
			"cambiar"=>[
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "direccin_residencial"=>"Dirección Residencial",
			"telfono_residencial"=>"Teléfono Residencial",
			"correo_electrnico"=>"Correo electrónico",
			"cambiar"=>"Cambiar"
        ];
    }
    
}