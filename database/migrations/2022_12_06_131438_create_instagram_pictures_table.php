<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_common')->create('instagram_pictures', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('post_link');
            $table->string('picture_name');
            $table->boolean('is_couture')->default('0');
            $table->boolean('is_village')->default('0');
            $table->boolean('is_sloow')->default('0');
            $table->boolean('is_form')->default('0');
            $table->boolean('is_reuse')->default('0');
            $table->boolean('is_break')->default('0');
            $table->boolean('is_lasa')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_common')->dropIfExists('instagram_pictures');
    }
};
