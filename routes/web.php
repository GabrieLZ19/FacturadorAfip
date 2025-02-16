<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// Ruta para crear una nueva factura
Route::post('invoices', [InvoiceController::class, 'store']);

// Ruta para obtener facturas por cliente
Route::get('invoices/client/{clientId}', [InvoiceController::class, 'getInvoicesByClient']);


Route::post('users', [UserController::class, 'store']); // Crear usuario
Route::get('users/{id}', [UserController::class, 'show']); // Ver usuario por ID
