<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

/**InformacionFamiliarSobr**/
/**InformacionFamiliarSobr**/
Route::delete("informacion-familiar-sobr/destroy", [InformacionFamiliarSobr\InformacionFamiliarSobrController::class,"destroy"])->name("informacion_familiar_sobr.delete");
Route::resource("informacion-familiar-sobr", InformacionFamiliarSobr\InformacionFamiliarSobrController::class)->parameters(["informacion-familiar-sobr" => "informacion_familiar_sobr_id"])->names("informacion_familiar_sobr")->except(["show"])->whereNumber("informacion_familiar_sobr_id");