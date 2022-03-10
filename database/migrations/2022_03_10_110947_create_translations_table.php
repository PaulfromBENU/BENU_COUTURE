<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('translations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('page');
            $table->string('key');
            $table->string('fr')->nullable();
            $table->string('en')->nullable();
            $table->string('de')->nullable();
            $table->string('lu')->nullable();
            $table->string('translation_key')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->dropIfExists('translations');
    }
}
