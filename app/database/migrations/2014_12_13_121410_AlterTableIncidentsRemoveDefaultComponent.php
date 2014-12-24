<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterTableIncidentsRemoveDefaultComponent extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incidents', function (Blueprint $table) {
            if (Config::get('database')['default'] === 'mysql'){
                DB::statement("ALTER TABLE incidents CHANGE component_id component_id TINYINT(4)  NOT NULL  DEFAULT '0';");
            } else if (Config::get('database')['default'] === 'pgsql'){
                DB::statement("ALTER TABLE incidents ALTER COLUMN component_id SET DEFAULT '0';");
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */     
    public function down()
    {
        Schema::table('incidents', function (Blueprint $table) {
            if (Config::get('database')['default'] === 'mysql'){
                DB::statement("ALTER TABLE incidents CHANGE component_id component_id TINYINT(4)  NOT NULL  DEFAULT '1';");
            } else if (Config::get('database')['default'] === 'pgsql'){
                DB::statement("ALTER TABLE incidents ALTER COLUMN component_id SET DEFAULT '1';");
            }
        });
    }
}

