<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

/**DatosPersonales**/
/**DatosPersonales**/
Route::delete("datos-personales/destroy", [DatosPersonales\DatosPersonalesController::class,"destroy"])->name("datos_personales.delete");
Route::resource("datos-personales", DatosPersonales\DatosPersonalesController::class)->parameters(["datos-personales" => "datos_personales_id"])->names("datos_personales")->except(["show"])->whereNumber("datos_personales_id");