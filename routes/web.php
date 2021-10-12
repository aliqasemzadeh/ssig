<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/', function () {
        return redirect('login');
    });

    Route::get('/user/avatar/{user}',[\App\Http\Controllers\UserController::class, 'avatar'])->name('user.avatar');
    Route::get('/user/signature/{user}',[\App\Http\Controllers\UserController::class, 'signature'])->name('user.signature');


    Route::get('/supply/dashboard/index', \App\Http\Livewire\Supply\Dashboard\Index::class)->name('supply.dashboard.index');

    Route::get('/admin/dashboard/index', \App\Http\Livewire\Admin\Dashboard\Index::class)->name('admin.dashboard.index');
    Route::get('/admin/project/index', \App\Http\Livewire\Admin\Project\Index::class)->name('admin.project.index');
    Route::get('/admin/group/index', \App\Http\Livewire\Admin\Group\Index::class)->name('admin.group.index');
    Route::get('/admin/user/index', \App\Http\Livewire\Admin\User\Index::class)->name('admin.user.index');
    Route::get('/admin/category/index', \App\Http\Livewire\Admin\Category\Index::class)->name('admin.category.index');
});

