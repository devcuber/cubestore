<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string    ('category'       );
            $table->char      ('code'     ,3    );
            $table->char      ('next_code',3    );
            $table->string    ('description'    );
            $table->integer   ('priority'       );
            $table->string    ('exec_function'  )->nullable();
            $table->text      ('html_icon'      )->nullable();
            $table->boolean   ('is_active'      );

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
        Schema::dropIfExists('statuses');
    }
}
