<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order__lines', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')  ->constrained('orders');
            $table->foreignId('product_id')->constrained('products');
            $table->integer  ('quantity');
            $table->decimal  ('unit_price', 6,2);
            $table->text     ('comment') ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order__lines');
    }
}
