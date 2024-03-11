<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\Superadmin\GuruController;
use App\Http\Controllers\SuperAdmin\ProgramStudiController;
use App\Http\Controllers\SuperAdmin\MapelController;
use App\Http\Controllers\SuperAdmin\SemesterController;
use App\Http\Controllers\SuperAdmin\KelasController;
use App\Http\Controllers\SuperAdmin\SiswaController;
use App\Http\Controllers\Admin\AdminGuruController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('superadmin')->middleware(['auth', 'checkRole:superadmin'])->group(function () {
    Route::get('/', [SuperAdminController::class, 'index'])->name('superadmin.index');
    Route::patch('/update-user-roles', [SuperAdminController::class, 'updateUserRoles'])->name('superadmin.updateUserRoles');

    // Rute untuk GuruController
    Route::get('/gurus', [GuruController::class, 'index'])->name('superadmin.gurus.index');
    Route::get('/gurus/create', [GuruController::class, 'create'])->name('superadmin.gurus.create');
    Route::post('/gurus', [GuruController::class, 'store'])->name('superadmin.gurus.store');
    Route::get('/gurus/{id}/edit', [GuruController::class, 'edit'])->name('superadmin.gurus.edit');
    Route::put('/gurus/{id}', [GuruController::class, 'update'])->name('superadmin.gurus.update');
    Route::get('/gurus/{id}', [GuruController::class, 'show'])->name('superadmin.gurus.show');
    Route::delete('/gurus/{id}', [GuruController::class, 'destroy'])->name('superadmin.gurus.destroy');

    // Rute untuk ProgramStudiController
    Route::get('/program_studis', [ProgramStudiController::class, 'index'])->name('superadmin.program_studis.index');
    Route::get('/program_studis/create', [ProgramStudiController::class, 'create'])->name('superadmin.program_studis.create');
    Route::post('/program_studis', [ProgramStudiController::class, 'store'])->name('superadmin.program_studis.store');
    Route::get('/program_studis/{id}/edit', [ProgramStudiController::class, 'edit'])->name('superadmin.program_studis.edit');
    Route::put('/program_studis/{id}', [ProgramStudiController::class, 'update'])->name('superadmin.program_studis.update');
    Route::get('/program_studis/{id}', [ProgramStudiController::class, 'show'])->name('superadmin.program_studis.show');
    Route::delete('/program_studis/{id}', [ProgramStudiController::class, 'destroy'])->name('superadmin.program_studis.destroy');

    // Rute untuk MapelController
    Route::get('/mapels', [MapelController::class, 'index'])->name('superadmin.mapels.index');
    Route::get('/mapels/create', [MapelController::class, 'create'])->name('superadmin.mapels.create');
    Route::post('/mapels', [MapelController::class, 'store'])->name('superadmin.mapels.store');
    Route::get('/mapels/{id}/edit', [MapelController::class, 'edit'])->name('superadmin.mapels.edit');
    Route::put('/mapels/{id}', [MapelController::class, 'update'])->name('superadmin.mapels.update');
    Route::get('/mapels/{id}', [MapelController::class, 'show'])->name('superadmin.mapels.show');
    Route::delete('/mapels/{id}', [MapelController::class, 'destroy'])->name('superadmin.mapels.destroy');

    // Rute untuk SemesterController
    Route::get('/semesters', [SemesterController::class, 'index'])->name('superadmin.semesters.index');
    Route::get('/semesters/create', [SemesterController::class, 'create'])->name('superadmin.semesters.create');
    Route::post('/semesters', [SemesterController::class, 'store'])->name('superadmin.semesters.store');
    Route::get('/semesters/{semester}', [SemesterController::class, 'show'])->name('superadmin.semesters.show');
    Route::get('/semesters/{semester}/edit', [SemesterController::class, 'edit'])->name('superadmin.semesters.edit');
    Route::put('/semesters/{semester}', [SemesterController::class, 'update'])->name('superadmin.semesters.update');
    Route::delete('/semesters/{semester}', [SemesterController::class, 'destroy'])->name('superadmin.semesters.destroy');

    // Rute untuk KelasController
    Route::get('/kelas', [KelasController::class, 'index'])->name('superadmin.kelas.index');
    Route::get('/kelas/create', [KelasController::class, 'create'])->name('superadmin.kelas.create');
    Route::post('/kelas', [KelasController::class, 'store'])->name('superadmin.kelas.store');
    Route::get('/kelas/{kelas}', [KelasController::class, 'show'])->name('superadmin.kelas.show');
    Route::get('/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('superadmin.kelas.edit');
    Route::put('/kelas/{kelas}', [KelasController::class, 'update'])->name('superadmin.kelas.update');
    Route::delete('/kelas/{kelas}', [KelasController::class, 'destroy'])->name('superadmin.kelas.destroy');

    // Rute untuk SiswaController
    Route::get('/siswas', [SiswaController::class, 'index'])->name('superadmin.siswas.index');
    Route::get('/siswas/create', [SiswaController::class, 'create'])->name('superadmin.siswas.create');
    Route::post('/siswas', [SiswaController::class, 'store'])->name('superadmin.siswas.store');
    Route::get('/siswas/{siswa}/edit', [SiswaController::class, 'edit'])->name('superadmin.siswas.edit');
    Route::put('/siswas/{siswa}', [SiswaController::class, 'update'])->name('superadmin.siswas.update');
    Route::get('/siswas/{siswa}', [SiswaController::class, 'show'])->name('superadmin.siswas.show');
    Route::delete('/siswas/{siswa}', [SiswaController::class, 'destroy'])->name('superadmin.siswas.destroy');
    Route::match(['get', 'post'], '/superadmin/siswas/{siswa}/export-pdf', [SiswaController::class, 'exportPdf'])
    ->name('superadmin.siswas.exportPdf');
});

Route::prefix('admin')->middleware(['auth', 'checkRole:admin'])->group(function () {
    // Routes yang memerlukan admin atau superadmin role
    Route::get('/gurus', [AdminGuruController::class, 'index'])->name('admin.gurus.index');
});

Route::middleware(['checkRole:user,admin,superadmin'])->group(function () {
    // Routes yang memerlukan user, admin, atau superadmin role
});


require __DIR__ . '/auth.php';
