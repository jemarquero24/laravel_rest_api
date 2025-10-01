<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\MemberController;
use App\Http\Controllers\API\BorrowRecordController;

Route::get('/test', function () {
    return response()->json(['message' => 'API route working!']);
});

Route::apiResource('books', BookController::class);
Route::apiResource('authors', AuthorController::class);
Route::apiResource('members', MemberController::class);
Route::apiResource('borrow-records', BorrowRecordController::class);
