<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_informations', function (Blueprint $table) {
            $table->id();

            $table->foreignId ('client_id')->constrained('clients');
            $table->string    ('name_holder');
            $table->string    ('phone'      );
            $table->string    ('city'       );
            $table->text      ('address'    );
            $table->boolean   ('is_active'  );
            $table->boolean   ('is_default' );
            $table->boolean   ('is_locked'  );

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
        Schema::dropIfExists('shipping_informations');
    }
}
