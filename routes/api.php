<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);

Route::apiResource('/produtos', ProdutoController::class);

/* 
    GET     /api/produtos
    POST    /api/produtos
    GET     /api/produtos/id
    PUT     /api/produtos/id
    DELETE  /api/produtos/id

*/