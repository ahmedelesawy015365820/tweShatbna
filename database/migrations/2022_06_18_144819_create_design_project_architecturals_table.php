<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignProjectArchitecturalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_project_architecturals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('architectural_id')->constrained('architecturals')->cascadeOnDelete();
            $table->foreignId('design_project_id')->constrained('design_projects')->cascadeOnDelete();
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
        Schema::dropIfExists('design_project_architecturals');
    }
}
