<?php declare(strict_types=1);

use Src\Core\Router\Route;


Route::view('', 'home');
Route::view('home', 'home');
Route::view('exhibits', 'exhibits');
Route::view('imprint', 'imprint');
Route::view('privacy', 'privacy');
Route::view('schedule', 'schedule');