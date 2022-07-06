<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignProjectUnitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_project_unities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unity_id')->constrained('unities')->cascadeOnDelete();
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
        Schema::dropIfExists('design_project_unities');
    }
}
