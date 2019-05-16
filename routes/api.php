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


Route::get('/user/{slug}','Public_Controller@getUser')->where('slug','[\w\d\-]+');
Route::get('/question/{slug}','Public_Controller@getQuestion')->where('slug','[\w\d\-]+');

// Messages Routes


Route::post(
    '/message/send',
    [
        'as' => 'message.send',
        'uses' => 'Public_Controller@store'
    ]
);
// Questions Routes


//Route::put(
//    '/question/{number}/update',
//    [
//        'as' => 'question.update',
//        'uses' => 'User_Controller@updateQuestion'
//    ]
//)
//    ->where('number','[\d]');

// Answers Routes

Route::post('answer/send','Public_Controller@storeAnswer');

// Authentication Routes

Route::post('login', 'Authentication_Controller@login');
Route::post('register', 'Authentication_Controller@register');
Route::get('logout','Authentication_Controller@logout');

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('details', 'Authentication_Controller@details');
    Route::get('user-info', 'User_Controller@getUser');
    Route::get('/questions','User_Controller@getQuestions');
    Route::get('/messages','User_Controller@getMessages');
    Route::delete('/message/{number}/delete','User_Controller@deleteMessage')->where('number','[0-9]+');
    Route::delete('/question/{number}/delete', 'User_Controller@deleteQuestion')->where('number','[0-9]+');
    Route::get('/question/{number}/details','User_Controller@getQuestion')->where('number','[0-9]+');
    Route::delete('/answer/{number}/delete', 'User_Controller@deleteAnswer')->where('number','[0-9]+');
    Route::post('/question/create', 'User_Controller@storeQuestion');
});
