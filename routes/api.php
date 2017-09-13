<?php
/**
 * Author: Pawan Homsuwan
 * Version: 1.0
 * Date: 2016-09-12
 *
 */
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

Route::group(['namespace' => 'V1', 'prefix' => 'v1'], function() {

  Route::group(['namespace' => 'Document\Controllers', 'prefix' => 'document', 'as' => 'document.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'ApiDocumentController@index' ]);
  });

  Route::group(['namespace' => 'Tasks\Controllers', 'prefix' => 'tasks', 'as' => 'tasks.'], function() {
    Route::get('/{id}', ['as' => 'show', 'uses' => 'TaskController@show' ]);
    Route::get('/', ['as' => 'index', 'uses' => 'TaskController@index' ]);
    Route::post('/', ['as' => 'store', 'uses' => 'TaskController@store' ]);
    Route::put('/{id}', ['as' => 'update', 'uses' => 'TaskController@update' ]);
    Route::delete('/{id}', ['as' => 'delete', 'uses' => 'TaskController@destroy' ]);
  });
});
