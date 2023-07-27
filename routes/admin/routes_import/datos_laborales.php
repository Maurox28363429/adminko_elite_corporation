<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

/**DatosLaborales**/
/**DatosLaborales**/
Route::delete("datos-laborales/destroy", [DatosLaborales\DatosLaboralesController::class,"destroy"])->name("datos_laborales.delete");
Route::resource("datos-laborales", DatosLaborales\DatosLaboralesController::class)->parameters(["datos-laborales" => "datos_laborales_id"])->names("datos_laborales")->except(["show"])->whereNumber("datos_laborales_id");