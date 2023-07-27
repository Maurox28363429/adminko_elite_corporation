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
namespace App\Requests\Admin\CuentaBancariaYReferen;
use Illuminate\Foundation\Http\FormRequest;

class CuentaBancariaYReferenRequest extends FormRequest
{
    public function rules()
    {
        return [
            "forma_de_pago"=>[
				"string",
				"nullable",
				"max:255"
			],
			"nombre_del_banco"=>[
				"string",
				"nullable",
				"max:255"
			],
			"nmero_de_cuenta_bancaria"=>[
				"integer",
				"min:-2147483648",
				"max:2147483647",
				"nullable"
			],
			"adjuntar_confirmacion_de_su_cuenta"=>[
				"file",
				"nullable"
			],
			"referencia_personal_1"=>[
				"string",
				"nullable",
				"max:255"
			],
			"referencia_personal_2"=>[
				"string",
				"nullable",
				"max:255"
			],
			"referencia_personal_3"=>[
				"string",
				"nullable",
				"max:255"
			],
			"referencia_comercial"=>[
				"string",
				"nullable",
				"max:255"
			]
        ];
    }
    public function attributes()
    {
        return [
            "forma_de_pago"=>"Forma de pago",
			"nombre_del_banco"=>"Nombre del banco",
			"nmero_de_cuenta_bancaria"=>"Número de cuenta bancaria",
			"adjuntar_confirmacion_de_su_cuenta"=>"Adjuntar confirmacion de su cuenta",
			"referencia_personal_1"=>"Referencia personal 1",
			"referencia_personal_2"=>"Referencia personal 2",
			"referencia_personal_3"=>"Referencia personal 3",
			"referencia_comercial"=>"Referencia comercial"
        ];
    }
    public function messages()
    {
        return [
            "adjuntar_confirmacion_de_su_cuenta.required_without"=>trans("validation.required")
        ];
    }


}