<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\Doctorcontroller;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\AmbulanceController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\InsuranceController;
use App\Http\Controllers\Dashboard\ServicesGroupController;
use App\Http\Controllers\Dashboard\SingleInvoiceController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {



        Route::get('/dashboard/user', function () {
            return view('Dashboard.User.dashboard');
        })->middleware(['auth'])->name('dashboard.user');

        Route::get('/dashboard/admin', function () {
            return view('Dashboard.Admin.dashboard');
        })->middleware(['auth:admin'])->name('dashboard.admin');

        //**************************** Routes groups Admins   ***************************
        Route::middleware(['auth:admin'])->group(function(){

        //**************************** Routes sections  ***************************

            Route::resource('sections',SectionController::class);

        //**************************** Routes Doctors  ***************************
    
            Route::resource('Doctors', DoctorController::class);
            Route::post('update_password',[DoctorController::class,'update_password'])->name('update_password');
            Route::post('update_status',[DoctorController::class,'update_status'])->name('update_status');

        //**************************** Routes Services   ***************************
    
            Route::resource('services',ServiceController::class);

        //**************************** Routes  groupService  ***************************
    
            Route::view('Add_groupServices','livewire.group-services.index')->name('Add_groupServices');

        //**************************** Routes  groupService ***************************
    
            Route::resource('insurances',InsuranceController::class);

        //**************************** Routes  Ambulance   ***************************

            Route::resource('Ambulance',AmbulanceController::class);

        //**************************** Routes Patients  ***************************

            Route::resource('Patients',PatientController::class);

        //**************************** Routes Patients single_invoices ***************************

            Route::resource('single_invoices',SingleInvoiceController::class);
            Route::post('/section/{id}', [SingleInvoiceController::class, 'getSection'])->name('ajax.getSection');
            Route::post('/service/{id}', [SingleInvoiceController::class, 'getPriceService']);


        });        
        
        require __DIR__ . '/auth.php';


        
    }
);