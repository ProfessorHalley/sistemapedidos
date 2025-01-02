<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [OrderController::class, 'index'])->name('orders.index'); // Rota para listar
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create'); // Rota para criar
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store'); // Rota para armazenar
Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit'); // Rota para editar
Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update'); // Rota para atualizar
Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy'); // Rota para excluir
