<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Client;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'invoice_number' => 'required|unique:invoices',
            'total' => 'required|numeric',
        ]);

        // Crear una nueva factura
        $invoice = Invoice::create([
            'client_id' => $validated['client_id'],
            'invoice_number' => $validated['invoice_number'],
            'total' => $validated['total'],
        ]);

        // Retornar la factura creada
        return response()->json($invoice, 201);
    }

    public function getInvoicesByClient($clientId)
{
    $client = Client::findOrFail($clientId);
    return response()->json($client->invoices);
}

}
