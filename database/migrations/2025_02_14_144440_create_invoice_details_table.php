<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('invoice_details', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('invoice_id');
        $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade'); // Relaciona con la tabla invoices
        $table->unsignedBigInteger('product_id');
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); // Relaciona con la tabla products
        $table->integer('quantity'); // Cantidad de productos
        $table->decimal('price', 8, 2); // Precio por unidad del producto
        $table->decimal('total', 10, 2); // Total por producto (cantidad * precio)
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_details');
    }
};
