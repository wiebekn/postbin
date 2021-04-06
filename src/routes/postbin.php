<?php

use Illuminate\Support\Facades\Route;

Route::any('/bin/{uuid}', 'PostController@index');
