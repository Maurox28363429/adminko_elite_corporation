<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Exports\DamasExport;
use Maatwebsite\Excel\Facades\Excel;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('exportDamasExcel',function(){
    return Excel::download(new DamasExport, 'damas-list.xlsx');
});
