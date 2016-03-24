<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class UpdateDeviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('devices', function($table) {
            $table->string('inventory');
            $table->string('supplier');
            $table->string('location');
            $table->integer('volume');
            $table->date('billdate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('devices', function($table) {
            $table->dropColumn('inventory');
            $table->dropColumn('supplier');
            $table->dropColumn('location');
            $table->dropColumn('volume');
            $table->dropColumn('billdate');
        });
    }
}
