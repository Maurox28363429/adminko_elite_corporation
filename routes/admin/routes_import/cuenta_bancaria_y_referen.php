<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

/**CuentaBancariaYReferen**/
/**CuentaBancariaYReferen**/
Route::delete("cuenta-bancaria-y-referen/destroy", [CuentaBancariaYReferen\CuentaBancariaYReferenController::class,"destroy"])->name("cuenta_bancaria_y_referen.delete");
Route::resource("cuenta-bancaria-y-referen", CuentaBancariaYReferen\CuentaBancariaYReferenController::class)->parameters(["cuenta-bancaria-y-referen" => "cuenta_bancaria_y_referen_id"])->names("cuenta_bancaria_y_referen")->except(["show"])->whereNumber("cuenta_bancaria_y_referen_id");