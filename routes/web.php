<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\EmployeeProgramController;
use App\Models\Department;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('register.register');
});

Route::get('/edit', function () {
    return view('edit.editpage-program');
});

Route::get('/participations', function () {
    return view('participations.index');
});

Route::get('/employee_program',function(){
    return view('employees.employees_programs');
});

Route::resource('departments', DepartmentController::class);

Route::resource('employees', EmployeeController::class);

Route::resource('participations', ParticipationController::class);

//Register and Show
Route::get('/register/register', [RegisterController::class, 'create'])->name('register.create');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/edit', [RegisterController::class, 'editPageProgram'])->name('edit.editpage-program');

Route::resource('register',RegisterController::class);

//Edit and Delete Program
// Route to show the edit form
Route::get('/edit/{id}', [RegisterController::class, 'edit'])->name('register.edit');
// Route to update the record
Route::put('/update/{id}', [RegisterController::class, 'update'])->name('register.update');
// Route to delete the record
Route::delete('/register/{id}', [RegisterController::class, 'destroy'])->name('register.destroy'); 



//Edit and Delete Participation
Route::get('/participations', [ParticipationController::class, 'index'])->name('participations.index');

Route::get('/participations/create', [ParticipationController::class, 'create'])->name('participations.create');

Route::post('/participations', [ParticipationController::class, 'store'])->name('participations.store');
//route to edit     
Route::get('/participations/edit/{id}', [ParticipationController::class, 'edit'])->name('participations.edit');

Route::put('/participations/update/{id}', [ParticipationController::class, 'update'])->name('participations.update');

Route::delete('/participations/delete/{id}', [ParticipationController::class, 'destroy'])->name('participations.destroy');

Route::resource('participations', ParticipationController::class);


Route::get('/employees/programs', [EmployeeController::class, 'showPrograms'])->name('employees.programs');
