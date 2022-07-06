<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisingViewTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertising_view_translations', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('locale')->index();
            $table->foreignId('view_id')->constrained('advertising_views')->cascadeOnDelete();
            $table->unique(['view_id', 'locale']);
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
        Schema::dropIfExists('advertising_view_translations');
    }
}
