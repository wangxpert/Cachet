<?php

/*
 * This file is part of Cachet.
 *
 * (c) James Brooks <james@cachethq.io>
 * (c) Joseph Cohen <joe@cachethq.io>
 * (c) Graham Campbell <graham@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetricPointsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('metric_points', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('metric_id');
            $table->decimal('value', 10, 3);
            $table->timestamps();

            $table->index('metric_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('metric_points');
    }
}
