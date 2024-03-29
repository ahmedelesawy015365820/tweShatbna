<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyEmpolyeeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_empolyee_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('job')->nullable();
            $table->string('locale')->index();
            $table->foreignId('company_empolyee_id')->constrained('company_empolyees')->cascadeOnDelete();
            $table->unique(['company_empolyee_id', 'locale']);
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
        Schema::dropIfExists('company_empolyee_translations');
    }
}
