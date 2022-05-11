<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageSalesTable extends Migration
{

    public function up()
    {
        Schema::create('package_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advertising_package_id')->constrained('advertising_packages')->cascadeOnDelete();
            $table->boolean('check')->default(false);
            $table->boolean('accept')->default(false);
            $table->boolean('complete')->default(false);
            $table->timestamps();
        });

    }


    public function down()
    {
        Schema::dropIfExists('package_sales');
    }
}
