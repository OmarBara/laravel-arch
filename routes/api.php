<?php
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

//1-php artisan make:model Product --migration
//2- Go to database created_table and modifie it
//3-php artisan migrate
//4-php artisan make:controller ProductController --api



Route::resource('product', ProductController::class);

//Public route
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/product/search/{name}', [ProductController::class, 'search']);

//Protected Route
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/product', [ProductController::class, 'store']);
    Route::put('/product/{id}', [ProductController::class, 'update']);
    Route::delete('/product/{id}', [ProductController::class, 'destroy']);
    
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




// Route::get('/insert','StudInsertController@insertform');
// Route::post('create','StudInsertController@insert');
