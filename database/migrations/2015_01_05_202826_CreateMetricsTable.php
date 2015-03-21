<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metrics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('suffix');
            $table->text('description');
            $table->decimal('default_value', 10, 3);
            $table->tinyInteger('calc_type');
            $table->boolean('display_chart')->default(1);
            $table->timestamps();

            $table->index('display_chart');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('metrics');
    }
}
