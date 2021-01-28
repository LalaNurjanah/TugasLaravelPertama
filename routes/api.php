<?php

use App\Http\Controllers\Api\CobaController;
use App\Http\Controllers\Api\GroupsController;
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
route::get('/friends/{id}', [Cobacontroller::class, 'show']);
route::put('/friends/{id}', [Cobacontroller::class, 'update']);
route::delete('/friends/{id}', [Cobacontroller::class, 'destroy']);

route::get('', [CobaController::class, 'index']);
route::resources([
    'friends' =>CobaController::class,
    'groups' =>GroupsController::class,
]);
route::get('/groups/addmember/{group}', [Groupscontroller::class, 'addmember']);
route::put('/groups/addmember/{group}', [Groupscontroller::class, 'updateaddmember']);
route::put('/groups/delateaddmember/{group}', [Groupscontroller::class, 'delateaddmember']);