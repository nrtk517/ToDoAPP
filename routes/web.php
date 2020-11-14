<?php

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


Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
    Route::post('/folders/create', 'FolderController@create');
    
    Route::group(['middleware' => 'can:view,folder'], function() {
        Route::get('/folders/{folder}/tasks', 'TaskController@index')->name('tasks.index');

        // タスクの新規作成画面を表示
        Route::get('/folders/{folder}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
        Route::post('/folders/{folder}/tasks/create', 'TaskController@create');

        // タスク編集画面を表示
        Route::get('/folders/{folder}/tasks/{task}/edit', 'TaskController@showEditForm')->name('tasks.edit');
        Route::post('/folders/{folder}/tasks/{task}/edit', 'TaskController@edit');

        // タスクの削除画面を表示
        Route::get('/folders/{folder}/tasks/{task}/delete', 'TaskController@showDeleteForm')->name('tasks.delete');
        Route::delete('/folders/{folder}/tasks/{task}/remove', 'TaskController@remove')->name('tasks.remove');

        // フォルダの削除
        Route::get('/folders/{folder}/delete', 'FolderController@showFoldersForm')->name('folders.delete');
        Route::delete('/folders/{folder}/remove', 'FolderController@remove')->name('folders.remove');
    });
});

Auth::routes();
Route::get('/login/guest', 'Auth\LoginController@guestLogin');