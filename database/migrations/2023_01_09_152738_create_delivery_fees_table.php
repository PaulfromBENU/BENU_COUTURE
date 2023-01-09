<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_common')->create('delivery_fees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('max_weight', $precision = 5, $scale = 2);
            $table->decimal('fee_zone_1', $precision = 5, $scale = 2);
            $table->decimal('fee_zone_2', $precision = 5, $scale = 2);
            $table->decimal('fee_zone_3', $precision = 5, $scale = 2);
            $table->decimal('fee_zone_4', $precision = 5, $scale = 2);
            $table->decimal('fee_zone_5', $precision = 5, $scale = 2);
            $table->decimal('fee_zone_6', $precision = 5, $scale = 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_common')->dropIfExists('delivery_fees');
    }
}
