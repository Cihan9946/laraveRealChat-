<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SampleController;

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
Route::get('/Admin',[\App\Http\Controllers\PanelController::class,'index'])->name('panel.index');

Route::controller(SampleController::class)->group(function(){

    Route::get('login', 'index')->name('login');

    Route::get('registration', 'registration')->name('registration');

    Route::get('logout', 'logout')->name('logout');

    Route::post('validate_registration', 'validate_registration')->name('sample.validate_registration');

    Route::post('validate_login', 'validate_login')->name('sample.validate_login');

    Route::get('dashboard', 'dashboard')->name('dashboard');

    Route::get('profile', 'profile')->name('profile');

    Route::post('profile_validation', 'profile_validation')->name('sample.profile_validation');


   /* Route::get('/role/fetch', [RoleController::class, 'fetch'])->name('panel.super_admin_role.fetch');
    Route::resource('role', RoleController::class)->names([
        'index' => 'panel.role_index',
        'create' => 'panel.role_create',
        'update' => 'panel.role_update',
    ]);*/

    Route::get('/role/fetch', [RoleController::class, 'fetch'])->name('panel.super_admin_role.fetch');
    Route::resource('role', RoleController::class)->names([
        'index' => 'panel.super_admin_role.index',
        'create' => 'panel.super_admin_role.create',
        'store' => 'panel.super_admin_role.store',
        'edit' => 'panel.super_admin_role.edit',
        'update' => 'panel.super_admin_role.update',
        'show' => 'panel.super_admin_role.show',
        'destroy' => 'panel.super_admin_role.destroy'
    ]);

    //UserList
    Route::group(['prefix' => '/user','middleware'=>'permission_check:User'], function () {
        Route::get('/user_list', [\App\Http\Controllers\PanelController::class, 'user_list'])->name('user.list');
        Route::post('/update-user', [\App\Http\Controllers\PanelController::class, 'updateUser'])->name('update.user');
        Route::get('/fetch-users', [\App\Http\Controllers\PanelController::class, 'fetch_users'])->name('fetch.users');
        Route::post('/delete-user', [\App\Http\Controllers\PanelController::class, 'delete_user'])->name('delete.user');
    });

    //Chat List
    Route::group(['prefix' => '/chat','middleware'=>'permission_check:User'], function () {
        Route::get('/user_chat', [\App\Http\Controllers\PanelController::class, 'chat_list'])->name('user.chat');
        Route::post('/update-chat', [\App\Http\Controllers\PanelController::class, 'updateChat'])->name('update.chat');
        Route::get('/fetch-chat', [\App\Http\Controllers\PanelController::class, 'fetch_chat'])->name('fetch.chat');
        Route::post('/delete-chat', [\App\Http\Controllers\PanelController::class, 'delete_chat'])->name('delete.chat');
    });
    //Chat request List(Sohbet istekleri)
    Route::group(['prefix' => '/chat','middleware'=>'permission_check:User'], function () {
        Route::get('/user_chatrequest', [\App\Http\Controllers\PanelController::class, 'chatrequest_list'])->name('user.chatrequest');
        Route::post('/update-chatrequest', [\App\Http\Controllers\PanelController::class, 'updateChatrequest'])->name('update.chatrequest');
        Route::get('/fetch-chatrequest', [\App\Http\Controllers\PanelController::class, 'fetch_chatrequest'])->name('fetch.chatrequest');
        Route::post('/delete-chatrequest', [\App\Http\Controllers\PanelController::class, 'delete_chatrequest'])->name('delete.chatrequest');
    });

        //Categories
    Route::group(['prefix' => '/categories'], function () {
        Route::post('/create', [CategoryController::class, "create"])->name('category.create');
        Route::get('/list', [CategoryController::class, "list"])->name('category.list');
        Route::get('/fetch', [CategoryController::class, 'fetch'])->name('category.fetch');
        Route::post('/delete', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('/get', [CategoryController::class, 'get'])->name('category.get');
        Route::post('/update', [CategoryController::class, 'update'])->name('category.update');
    });
    //Categories
    Route::group(['prefix' => '/newuser'], function () {
        Route::post('/create', [\App\Http\Controllers\PanelController::class, "create"])->name('create');
        Route::get('/list', [\App\Http\Controllers\PanelController::class, "list"])->name('list');
        Route::get('/fetch', [\App\Http\Controllers\PanelController::class, 'fetch'])->name('fetch');
        Route::post('/delete',[\App\Http\Controllers\PanelController::class, 'delete'])->name('delete');
        Route::get('/get', [\App\Http\Controllers\PanelController::class, 'get'])->name('get');
        Route::post('/update',[\App\Http\Controllers\PanelController::class, 'update'])->name('update');
    });

});
