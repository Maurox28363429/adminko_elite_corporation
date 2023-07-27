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
namespace App\Models\Admin\DatosPersonales;
use Illuminate\Database\Eloquent\Model;


class DatosPersonales extends Model
{
    
    public $table = 'datos_personales';
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"direccin_residencial",
		"consume_tabaco",
		"telfono_residencial",
		"correo_electrnico",
		"cambiar",
    ];
    
    public function scopeStartSorting($query, $request)
    {
        if ($request->has('datos_personales_sort_by') && $request->datos_personales_sort_by) {
            if($request->datos_personales_direction == "desc"){
                $query->orderByDesc($request->datos_personales_sort_by);
            } else {
                $query->orderBy($request->datos_personales_sort_by);
            }
        } else {
            $query->orderByDesc("id");
        }
    }
	public function scopeStartSearch($query, $search)
    {
        if ($search) {
            $query->where("correo_electrnico","like","%".$search."%")
			->orWhere("direccin_residencial","like","%".$search."%")
			->orWhere("telfono_residencial","like","%".$search."%");
        }
    }
}