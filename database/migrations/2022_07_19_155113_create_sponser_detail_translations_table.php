<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponserDetailTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponser_detail_translations', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->string('locale')->index();
            $table->foreignId('sponser_id')->constrained('sponser_details')->cascadeOnDelete();
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
        Schema::dropIfExists('sponser_detail_translations');
    }
}
