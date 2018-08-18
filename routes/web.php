<?php
/**
 * Created by ijsbrand van Prattenburg.
 * Date: 31-07-18
 * Time: 21:41
 */

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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'DashboardController@index');
Route::post('project/expected_end', 'ProjectController@expectedEnd');
Route::resource('projects', 'ProjectController');