<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProjectArchitecturalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_project_architecturals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('architectural_id')->constrained('architecturals')->cascadeOnDelete();
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
        Schema::dropIfExists('company_project_architecturals');
    }
}
