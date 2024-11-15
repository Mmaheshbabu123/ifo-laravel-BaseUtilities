<?php

use Illuminate\Support\Facades\Route;
use Packages\IfoBaseUtilities\Facades\Response;

Route::get('/ifobaseutilities', function () {
    return Response::send('this is ifobaseutilities package api v1',200);
});
