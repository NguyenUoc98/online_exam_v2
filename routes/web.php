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

Route::get('/', [
    'as'   => 'home',
    'uses' => 'HomeController@index'
]);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('exams/{id}/order', [
        'as'   => 'voyager.exams.order-question',
        'uses' => 'Admin\ExamController@orderQuestion'
    ]);
    Route::post('exams/{id}/order', [
        'as'   => 'voyager.exams.update-order-question',
        'uses' => 'Admin\ExamController@updateOrderQuestion'
    ]);
    Route::post('exams/{id}/create-auto', [
        'as'   => 'voyager.exams.create-auto',
        'uses' => 'Admin\ExamController@createAuto'
    ]);
});

Route::get('home', [
    'as'   => 'home',
    'uses' => 'HomeController@index'
]);

Route::get('news', [
    'as'   => 'news',
    'uses' => 'HomeController@news'
]);

Route::get('page/{slug}', [
    'as'   => 'page',
    'uses' => 'HomeController@page',
]);

Route::get('semester/{slug}', [
    'as'   => 'semester.show',
    'uses' => 'SemesterController@show'
]);

Route::prefix('exam')->group(function () {
    Route::get('/{id}', [
        'as'   => 'exam.show',
        'uses' => 'ExamController@show'
    ]);
    Route::get('doing/{id}', [
        'as'   => 'exam.doing',
        'uses' => 'ExamController@doing'
    ]);
    Route::get('get-result/{exam_id}', [
        'as'   => 'exam.get-result',
        'uses' => 'ExamController@getResult'
    ]);
    Route::post('save-result', [
        'as'   => 'exam.save-result',
        'uses' => 'ExamController@saveResult'
    ]);
});

Route::post('comment/{id}', [
    'as'   => 'comment.store',
    'uses' => 'CommentController@store'
]);

Route::post('rating/{id}', [
    'as'   => 'rating.store',
    'uses' => 'RateController@store'
]);

Route::prefix('profile')->group(function() {
    Route::get('/', [
        'as'   => 'user.profile',
        'uses' => 'HomeController@profile'
    ]);
    Route::put('update-account', [
        'as' => 'user.update-account',
        'uses' => 'HomeController@updateAccount'
    ]);
    Route::put('update-password', [
        'as' => 'user.update-password',
        'uses' => 'HomeController@updatePassword'
    ]);
});

Route::get('documents', [
    'as' => 'documents.index',
    'uses' => 'HomeController@documents'
]);


Auth::routes();
