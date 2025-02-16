<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;


// Rutas de usuario
Route::post('users', [UserController::class, 'store']); // Crear usuario
Route::get('users/{id}', [UserController::class, 'show']); // Obtener usuario por ID

// Rutas de facturas
Route::post('invoices', [InvoiceController::class, 'store']); // Crear factura
Route::get('invoices/client/{clientId}', [InvoiceController::class, 'getInvoicesByClient']); // Obtener facturas por cliente
















?>