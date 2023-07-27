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
namespace App\Models\Admin\Damas;
use Illuminate\Database\Eloquent\Model;


class Damas extends Model
{
    
    public $table = 'damas';
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"nombre_de_su_gineclogo",
		"direccin_de_la_clnica",
		"porque_asisti",
		"se_ha_realizado_pap",
    ];
    
    public function scopeStartSorting($query, $request)
    {
        if ($request->has('damas_sort_by') && $request->damas_sort_by) {
            if($request->damas_direction == "desc"){
                $query->orderByDesc($request->damas_sort_by);
            } else {
                $query->orderBy($request->damas_sort_by);
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