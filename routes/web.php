<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LatesController;
use App\Http\Controllers\RayonsController;
use App\Http\Controllers\RombelsController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::post('login/auth', [UserController::class, 'loginAuth'])->name('login.auth');

Route::middleware('isGuest')->group(function () {
    Route::get('/', function () {
        return view('login');
    })->name('login');
});

Route::middleware('isLogin')->group(function () {
    Route::get('/error', function () {
        return view('error');
    });

    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('isAdmin')->group(function () {
        Route::prefix('admin/user')->name('admin.user.')->group(function () {
            Route::get('index', [UserController::class, 'index'])->name('index');
            Route::get('create', [UserController::class, 'create'])->name('create');
            Route::post('store', [UserController::class, 'store'])->name('store');
            Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::patch('edit/{id}', [UserController::class, 'update'])->name('update');
            
        });
        Route::prefix('admin/rayon')->name('admin.rayon.')->group(function () {
            Route::get('index', [RayonsController::class, 'index'])->name('index');
            Route::get('create', [RayonsController::class, 'create'])->name('create');
            Route::post('store', [RayonsController::class, 'store'])->name('store');
            Route::get('edit/{id}', [RayonsController::class, 'edit'])->name('edit');
            Route::patch('edit/{id}', [RayonsController::class, 'update'])->name('update');
        });

        Route::prefix('admin/rombel')->name('admin.rombel.')->group(function () {
            Route::get('index', [RombelsController::class, 'index'])->name('index');
            Route::get('create', [RombelsController::class, 'create'])->name('create');
            Route::post('store', [RombelsController::class, 'store'])->name('store');
            Route::get('edit/{id}', [RombelsController::class, 'edit'])->name('edit');
            Route::patch('edit/{id}', [RombelsController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [RombelsController::class, 'destroy'])->name('delete');
        });

        Route::prefix('admin/student')->name('admin.student.')->group(function () {
            Route::get('index', [StudentsController::class, 'index'])->name('index');
            Route::get('create', [StudentsController::class, 'create'])->name('create');
            Route::post('store', [StudentsController::class, 'store'])->name('store');
            Route::get('edit/{id}', [StudentsController::class, 'edit'])->name('edit');
            Route::patch('edit/{id}', [StudentsController::class, 'update'])->name('update');
        });
        Route::prefix('admin/data-telat')->name('admin.data-telat.')->group(function () {
            Route::get('index', [LatesController::class, 'index'])->name('index');
            Route::get('create', [LatesController::class, 'create'])->name('create');
            Route::post('store', [LatesController::class, 'store'])->name('store');
            Route::get('edit/{id}', [LatesController::class, 'edit'])->name('edit');
            Route::patch('edit/{id}', [LatesController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [LatesController::class, 'destroy'])->name('destroy');
            Route::get('show/{student_id}', [LatesController::class, 'show'])->name('show');
            Route::get('/downloadExcel', [LatesController::class, 'downloadExcel'])->name('downloadExcel');
            Route::get('/adm-downloadPDF{id}', [LatesController::class, 'downloadPDF'])->name('downloadPDF');
        });
    });

    Route::middleware('isPS')->group(function() {
        Route::get('/students', [StudentsController::class, 'indexSiswa'])->name('indexSiswa');
        Route::get('/ps/data-telat', [LatesController::class, 'indexDataTelat'])->name('indexDataTelat');
        Route::get('/ps/detail/{id}', [LatesController::class, 'detailStudent'])->name('detailStudent');
        Route::get('/ps/ps-downloadPDF{id}', [LatesController::class, 'downloadPDF'])->name('downloadPDF');
        Route::get('/ps/ps-downloadExcel', [LatesController::class, 'downloadExcelPS'])->name('downloadExcel');
    });
});
