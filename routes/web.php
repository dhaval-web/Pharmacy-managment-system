<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\managment;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// catagory filed
Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[managment::class,'index']);
Route::get('/catagory_view',[managment::class,'view']);
Route::post('/catagory_view',[managment::class,'view']);
Route::get('/login', function () {
    return view('login');
});
Route::get('/add_catagory',function(){
    return view('add_catagory');
});
Route::post('/add_catagory',[managment::class,'add']);
Route::get('/delete-user/{id}', [managment::class, 'deleteUser'])->name('delete.users');
Route::get('/edit_catagory/{id}', [managment::class, 'editUser'])->name('edit.users');
Route::post('/update-users', [managment::class, 'updateUser'])->name('update.users');

//madicine catagory

Route::post('/medicine_view',[managment::class,'medicine_view']);
Route::get('/medicine_view',[managment::class,'medicine_view']);
Route::get('/add_medicine',function(){
    return view('add_medicine');
});
Route::post('/add_medicine',[managment::class,'add_medicine']);
Route::get('/delete_medicine/{id}', [managment::class, 'deletemedicine'])->name('delete.medicine');
Route::get('/edit_medicine/{id}', [managment::class, 'editmedicine'])->name('edit.medicine');
Route::post('/update-medicine', [managment::class, 'updatemedicine'])->name('update.medicine');

require __DIR__.'/auth.php';


// stock fileds

//Route::get('/medicine_view',[managment::class,'medicine_view']);
Route::get('add_stock',function(){
    return view('add_stock');
});
Route::post('/add_stock',[managment::class,'add_stock']);
Route::post('/stock_view',[managment::class,'stock_view']);
Route::get('/stock_view',[managment::class,'stock_view']);
Route::get('/delete_stock/{id}', [managment::class, 'deletestock'])->name('delete.stock');
Route::get('/edit_stock/{id}', [managment::class, 'editstock'])->name('edit.stock');
Route::post('/update-stock', [managment::class, 'updatestock'])->name('update.stock');


//memeber filed

Route::get('add_member',function(){
    return view('add_member');
});
Route::post('/add_member',[managment::class,'add_member']);
Route::post('/member_view',[managment::class,'member_view']);
Route::get('/member_view',[managment::class,'member_view']);
Route::get('/delete_member/{id}', [managment::class, 'deletemember'])->name('delete.member');
Route::get('/edit_member/{id}', [managment::class, 'editmember'])->name('edit.member');
Route::post('/update-member', [managment::class, 'updatemember'])->name('update.member');
