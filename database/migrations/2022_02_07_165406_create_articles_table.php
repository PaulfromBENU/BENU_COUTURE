<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            //$table->string('type')->default('article');
            $table->foreignId('creation_id')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('size_id')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('color_id')->onUpdate('cascade')->onDelete('cascade')->nullable();
            //$table->integer('stock')->default('0');
            $table->string('secondary_color')->nullable();
            $table->string('third_color')->nullable();
            $table->string('mask_stripes')->nullable();
            $table->boolean('mask_filter')->default('0');
            $table->string('voucher_value')->default('Par tranches de 30');
            $table->string('voucher_type')->default('pdf');
            $table->text('singularity_lu');
            $table->text('singularity_fr');
            $table->text('singularity_en');
            $table->text('singularity_de');
            $table->string('translation_key')->default("article.singularity-");
            $table->string('creation_date')->default('unknown');
            $table->boolean('is_returned')->default('0');
            $table->date('return_date')->default('2022-01-01');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->dropIfExists('articles');
    }
}
