<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_common')->table('orders', function (Blueprint $table) {
            $table->text('comment')->nullable();
            $table->integer('extra_discount')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_common')->table('orders', function (Blueprint $table) {
            $table->dropColumn('comment');
            $table->dropColumn('extra_discount');
        });
    }
}
