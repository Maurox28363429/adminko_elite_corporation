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
namespace App\Models\Admin\CuentaBancariaYReferen;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Admin\AdminService\Traits\AdminFileUploadTrait;

class CuentaBancariaYReferen extends Model
{
    use AdminFileUploadTrait;
    public $table = 'cuenta_bancaria_y_referen';
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"forma_de_pago",
		"nombre_del_banco",
		"nmero_de_cuenta_bancaria",
		"adjuntar_confirmacion_de_su_cuenta",
		"ak_adjuntar_confirmacion_de_su_cuenta_delete",
		"referencia_personal_1",
		"referencia_personal_2",
		"referencia_personal_3",
		"referencia_comercial",
    ];
    
	public function fileInfo($key=false)
    {
        $file_info = [
			"adjuntar_confirmacion_de_su_cuenta"=>[
				"disk"=>config("admin.settings.upload_disk"),
				"original"=>["folder"=>"/upload/"]
			]
		];
        return ($key)?$file_info[$key]:$file_info;
    }
    public function setAdjuntarConfirmacionDeSuCuentaAttribute()
    {
        if (request()->hasFile('adjuntar_confirmacion_de_su_cuenta')) {
            $this->attributes['adjuntar_confirmacion_de_su_cuenta'] = $this->akFileUpload(request()->file("adjuntar_confirmacion_de_su_cuenta"), $this->fileInfo("adjuntar_confirmacion_de_su_cuenta"), $this->getOriginal('adjuntar_confirmacion_de_su_cuenta'));
        }
    }
    public function getAdjuntarConfirmacionDeSuCuentaAttribute($value)
    {
        if ($value && $this->akFileExists($this->fileInfo("adjuntar_confirmacion_de_su_cuenta")['disk'],$this->fileInfo("adjuntar_confirmacion_de_su_cuenta")['original']["folder"],$value)) {
            return $this->akGetURLPath($this->fileInfo("adjuntar_confirmacion_de_su_cuenta")['disk'],$this->fileInfo("adjuntar_confirmacion_de_su_cuenta")['original']["folder"],$value);
        }
        return false;
    }
    public function setAkAdjuntarConfirmacionDeSuCuentaDeleteAttribute($delete)
    {
        if (!request()->hasFile('adjuntar_confirmacion_de_su_cuenta') && $delete == 1) {
            $this->attributes['adjuntar_confirmacion_de_su_cuenta'] = $this->akFileUpload('', $this->fileInfo("adjuntar_confirmacion_de_su_cuenta"), $this->getOriginal('adjuntar_confirmacion_de_su_cuenta'), 1);
        }
    }
	public function scopeStartSorting($query, $request)
    {
        if ($request->has('cuenta_bancaria_y_referen_sort_by') && $request->cuenta_bancaria_y_referen_sort_by) {
            if($request->cuenta_bancaria_y_referen_direction == "desc"){
                $query->orderByDesc($request->cuenta_bancaria_y_referen_sort_by);
            } else {
                $query->orderBy($request->cuenta_bancaria_y_referen_sort_by);
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