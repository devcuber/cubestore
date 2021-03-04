<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string ('code'         );
            $table->string ('option'       );
            $table->string ('name'         );
            $table->string ('seller'       );
            $table->decimal('price'   ,6,2 );
            $table->decimal('cost'    ,6,2 );
            $table->string ('image'        ) -> nullable();
            $table->string ('category'     );
            $table->integer('available'    );
            $table->boolean('is_deprecated');

            $table->boolean('is_active');
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
        Schema::dropIfExists('products');
    }
}
