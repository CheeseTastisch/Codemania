<?php

use App\Http\Controllers\member\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require_once __DIR__ . '/web/public.php';

Route::middleware('guest')->group(fn() => require_once __DIR__ . '/web/guest.php');
Route::middleware('auth')->group(fn() => require_once __DIR__ . '/web/auth.php');
Route::middleware(['auth', 'admin.full'])->prefix('admin/')->group(fn() => require_once __DIR__ . '/web/admin.php');

Route::view('/test', 'site.public.test');
