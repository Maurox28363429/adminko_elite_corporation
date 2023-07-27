<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

/**Damas**/
/**Damas**/
Route::delete("damas/destroy", [Damas\DamasController::class,"destroy"])->name("damas.delete");
Route::resource("damas", Damas\DamasController::class)->parameters(["damas" => "damas_id"])->names("damas")->except(["show"])->whereNumber("damas_id");