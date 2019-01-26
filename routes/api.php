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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::apiResources([
    'stores' => 'API\StoreController',
    'articles' => 'API\ArticleController'
]);

// I think is better in this way
Route::get('stores/{store}/articles', 'API\ArticleController@getArticlesByStore');

// As document requires
Route::get('articles/stores/{store}', 'API\ArticleController@getArticlesByStore');
