<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProjectUnitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_project_unities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unity_id')->constrained('unities')->cascadeOnDelete();
            $table->foreignId('company_project_id')->constrained('company_projects')->cascadeOnDelete();
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
        Schema::dropIfExists('company_project_unities');
    }
}
