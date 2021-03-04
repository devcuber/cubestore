<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->integer   ('day_order_num')     ;
            $table->foreignId ('client_id')         ->constrained('clients');
            $table->foreignId ('shipping_info_id')  ->constrained('shipping_informations');
            $table->boolean   ('is_active')         ;
            $table->text      ('comment')           ->nullable();

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
        Schema::dropIfExists('orders');
    }
}
