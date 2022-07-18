<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponserTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponser_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('locale')->index();
            $table->foreignId('sponser_id')->constrained('sponsers')->cascadeOnDelete();
            $table->unique(['sponser_id', 'locale']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponser_translations');
    }
}
