<?php
use App\Http\Controllers\groupscontroller;
use App\Http\Controllers\cobacontroller;
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

route::get('', [Cobacontroller::class, 'index']);
//route::get('/friends', [Cobacontroller::class, 'index']);
//route::get('/friends/create', [Cobacontroller::class, 'create']);
//route::post('/friends', [Cobacontroller::class, 'store']);
//route::get('/friends/{id}', [Cobacontroller::class, 'show']);
//route::get('/friends/{id}/edit', [Cobacontroller::class, 'edit']);
//route::put('/friends/{id}', [Cobacontroller::class, 'update']);
//route::delete('/friends/{id}', [Cobacontroller::class, 'destroy']);

route::resources([
    'friends' =>cobacontroller::class,
    'groups' =>groupscontroller::class,
]);
route::get('/groups/addmember/{group}', [Groupscontroller::class, 'addmember']);
route::put('/groups/addmember/{group}', [Groupscontroller::class, 'updateaddmember']);
route::put('/groups/delateaddmember/{group}', [Groupscontroller::class, 'delateaddmember']);