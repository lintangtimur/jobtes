<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MemberController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    
    return view('welcome');
});



Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('member', [MemberController::class, 'index'])->name('member');
    Route::get('member/add', [MemberController::class, 'create'])->name('member.add');
    Route::post('member/store', [MemberController::class, 'store'])->name('member.store');
    Route::get('members/json', [MemberController::class, 'json'])->name('member.json');
    Route::get('member/{id}', [MemberController::class,'show'])->name('member.show')->middleware('signed');
    Route::post('member/update', [MemberController::class, 'update'])->name('member.update');
    
    
    
});

Route::view('login/member', 'login_member')->name('login.member');
Route::post('register/store', [MemberController::class, 'register_store'])->name('register.store');


Route::get('generate', function(){
    // $role_admin = Role::create(['name'=> 'admin']);
    // $role_member = Role::create(['name'=> 'member']);

    // $permission = Permission::create(['name'=> 'view member']);
    // $permission_del = Permission::create(['name'=> 'delete member']);
    // $permission_edit = Permission::create(['name'=> 'edit member']);
    // $permission_create = Permission::create(['name'=> 'create member']);

    // $role_admin->syncPermissions([$permission, $permission_del, $permission_edit, $permission_create]);
    $role_member = Role::findByName('member');
    $role_member->syncPermissions(['view member','edit member']);
});

// Route::get('dashboard/member', [MemberController::class], 'index')->name('dashboard.member');
// Route::get('dashboard/admin', [AdminController::class], 'index')->name('dashboard.admin');

Route::get('give', function(){
    $user = User::where('id',1)->first();
    $user->assignRole('admin');
    $mem = User::where('id',2)->first();
    $mem->assignRole('member');
});