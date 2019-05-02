<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get(
    '/user/{slug}',
    [
        'as' => 'user.info',
        'uses' => 'Public_Controller@getUser'
    ]
)
    ->where('slug','[\w\d\-]+');

// Messages Routes
Route::get(
    '/user/messages',
    [
        'as' => 'user.messages',
        'uses' => 'User_Controller@index'
    ]
);
Route::delete(
    '/message/{number}/delete',
    [
        'as' => 'message.delete',
        'uses' => 'User_Controller@deleteMessage'
    ]
)
    ->where('number','[\d]');
Route::post(
    '/message/send',
    [
        'as' => 'message.send',
        'uses' => 'Public_Controller@store'
    ]
);
// Questions Routes
Route::post(
    '/question/create',
    [
        'as' => 'question.store',
        'uses' => 'User_Controller@storeQuestion'
    ]
);

Route::put(
    '/question/{number}/update',
    [
        'as' => 'question.update',
        'uses' => 'User_Controller@updateQuestion'
    ]
)
    ->where('number','[\d]');

Route::delete(
    '/question/{number}/delete',
    [
        'as' => 'question.delete',
        'uses' => 'User_Controller@deleteQuestion'
    ]
)
    ->where('number','[\d]');
// Answers Routes

Route::post(
    'answer/send',
    [
        'as' => 'answer.send',
        'uses' => 'User_Controller@storeAnswer'
    ]
);

Route::delete(
    'answer/{number}/delete',
    [
        'as' => 'answer.delete',
        'uses' => 'User_Controller@deleteAnswer'
    ]
)
    ->where('number','[\d]');
// Authentication Routes

Route::post('login', 'Authentication_Controller@login');
Route::post('register', 'Authentication_Controller@register');
Route::get('logout','Authentication_Controller@logout');

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('details', 'Authentication_Controller@details');
    Route::get('user-info', 'User_Controller@getUser');

});
