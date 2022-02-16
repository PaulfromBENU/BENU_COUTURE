<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('creations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->unique();
            //$table->foreignId('creation_group_id')->onUpdate('cascade')->nullOnDelete();
            $table->foreignId('creation_category_id')->onUpdate('cascade')->nullOnDelete();
            //$table->string('gender')->nullable();
            $table->decimal('price', $precision = 6, $scale = 2)->default('0');
            $table->text('description_lu');
            $table->text('description_fr');
            $table->text('description_en');
            $table->text('description_de');
            $table->string('origin_link')->nullable();
            $table->boolean('rental_enabled')->default('0');
            $table->foreignId('partner_id')->onUpdate('cascade')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->dropIfExists('creations');
    }
}
