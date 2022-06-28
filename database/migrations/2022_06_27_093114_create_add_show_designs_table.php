<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddShowDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_show_designs', function (Blueprint $table) {
            $table->id();
            $table->string('day')->nullable();
            $table->double('value',8,2)->nullable();
            $table->double('commission',8,2)->nullable();
            $table->text('description')->nullable();
            $table->foreignId('design_project_id')->constrained('design_projects')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
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
        Schema::dropIfExists('add_show_designs');
    }
}
