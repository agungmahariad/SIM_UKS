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

Route::get('/', 'login@index');

Route::post('/login', 'login@masuk');
Route::get('/logout', 'login@keluar');

Route::get('/dashboard', 'admin@index');
Route::get('/pasien', 'admin@pasien');
Route::get('/pasien/{id}', 'admin@getDetailPasien');
Route::post('/savepasien', 'admin@savepasien');
Route::get('/deletepasien/{id}', 'admin@deletepasien');

Route::get('/laporan', 'admin@laporan');
Route::get('/excel','admin@excel');

Route::get('/rayon', 'admin@rayon');
Route::get('/createrayon', 'admin@createrayon');
Route::post('/saverayon', 'admin@saverayon');
Route::get('/deleterayon/{id_rayon}', 'admin@deleterayon');
Route::get('/editrayon/{id_rayon}', 'admin@editrayon');
Route::patch('updaterayon/{id_rayon}', 'admin@updaterayon');


Route::get('/rombel', 'admin@rombel');
Route::get('/createrombel', 'admin@createrombel');
Route::post('/saverombel', 'admin@saverombel');
Route::get('/deleterombel/{id_rombel}', 'admin@deleterombel');

Route::get('/editrombel/{id_rombel}', 'admin@editrombel');
Route::patch('updaterombel/{id_rombel}', 'admin@updaterombel');

Route::get('/jurusan', 'admin@jurusan');
Route::get('/createjurusan', 'admin@createjurusan');
Route::post('/savejurusan', 'admin@savejurusan');
Route::get('/deletejurusan/{id_jurusan}', 'admin@deletejurusan');
Route::get('/editjurusan/{id_jurusan}', 'admin@editjurusan');
Route::patch('updatejurusan/{id_jurusan}', 'admin@updatejurusan');

Route::get('/murid', 'admin@murid');
Route::get('/createmurid', 'admin@createmurid');
Route::post('/savemurid', 'admin@savemurid');
Route::get('/deletemurid/{nis}', 'admin@deletemurid');
Route::get('/editmurid/{nis}', 'admin@editmurid');
Route::patch('updatemurid/{nis}', 'admin@updatemurid');

Route::get('/obat', 'admin@obat');
Route::get('/createobat', 'admin@createobat');
Route::post('/saveobat', 'admin@saveobat');
Route::get('/deleteobat/{id_obat}', 'admin@deleteobat');
Route::get('/editobat/{id_obat}', 'admin@editobat');
Route::patch('updateobat/{id_obat}', 'admin@updateobat');
