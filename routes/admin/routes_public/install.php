<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;


Route::get('/install', [InstallController::class, 'index'])->name('index');
Route::get('/install-setup', [InstallController::class, 'installSetup'])->name('install_setup');
Route::post('/install-setup', [InstallController::class, 'save'])->name('save');
Route::get('/install-step_two', [InstallController::class, 'installStepTwo'])->name('install_step_two');

