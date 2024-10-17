<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\PhotoController;

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CustomerController;

use App\Http\Controllers\HomeController;

use Illuminate\Http\Request;



//Route::get('/',[DemoController::class,'index']);
//Route::get('/about','App\Http\Controllers\DemoController@about');  
//Route::get('/courses',SingleActionController::class);
//Route::resource('photo',PhotoController::class); 



//Route::get('/',function(){
// return view('index');
//});


Route::get('/', [HomeController::class, 'index']);

Route::get('/register', [RegistrationController::class, 'index']);
Route::post('/register', [RegistrationController::class, 'register']);
//--------------------------------------------//

/* Route to show the form (GET)
Route::get('/customer/create', [CustomerController::class, 'index']);
// Route To Delete Customer Id
Route::get('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');

// Route To Edit Customer Id
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
// Route To update Customer
Route::post('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
// Route to view customers (GET)
Route::get('/customer', [CustomerController::class, 'viewcustomer']);
// Route to handle form submission (POST)
Route::post('/customer', [CustomerController::class, 'store']);
// Rout for customer Trash.
Route::get('/customer/trash', [CustomerController::class, 'trash']);
//Route::get('/customer/trash', [CustomerController::class, 'trash'])->name('customer.trash');

//Route For customer Restore
Route::get('/customer/restore/{id}', [CustomerController::class, 'restore'])->name('customer.restore');

// Route For permenantely Delete
Route::get('/customer/forcedelete/{id}', [CustomerController::class, 'forcedelete'])->name('customer.forcedelete');
//----------------------------------------*/


//Routes Grouping
Route:: group(['prefix'=>'/customer'],function(){
   
// Route to show the form (GET)
Route::get('create', [CustomerController::class, 'index']);
// Route To Delete Customer Id
Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');

// Route To Edit Customer Id
Route::get('edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
// Route To update Customer
Route::post('update/{id}', [CustomerController::class, 'update'])->name('customer.update');
// Route to view customers (GET)
Route::get('/', [CustomerController::class, 'viewcustomer']);
// Route to handle form submission (POST)
Route::post('/', [CustomerController::class, 'store']);
// Rout for customer Trash.
Route::get('trash', [CustomerController::class, 'trash']);
//Route::get('/customer/trash', [CustomerController::class, 'trash'])->name('customer.trash');

//Route For customer Restore
Route::get('restore/{id}', [CustomerController::class, 'restore'])->name('customer.restore');

// Route For permenantely Delete
Route::get('forcedelete/{id}', [CustomerController::class, 'forcedelete'])->name('customer.forcedelete');


});
   






//session start here.
Route::get('get-all-session', function () {
   $session = session()->all();
   p($session);
});

Route::get('set-session', function (Request $request) {
   $request->session()->put('name', 'Bilal Shakeel');
   $request->session()->put('user_id', '123');
   return redirect('get-all-session');
});


Route::get('destroy-session', function () {
   session()->forget(['name', 'user_id']);
   // session()->forget('user_id');
   return redirect('get-all-session');
});
