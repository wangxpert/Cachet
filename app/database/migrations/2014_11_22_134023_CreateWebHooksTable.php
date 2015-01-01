<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebHooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_hooks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(false);
            $table->string('endpoint')->nullable(false);
            $table->tinyInteger('hook_type')->default(0); // When should this web hook be called?
            $table->tinyInteger('request_type')->default(0); // ENUM: GET, POST, PUT, DELETE etc
            $table->boolean('active')->default(0);
            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('web_hooks');
    }
}
