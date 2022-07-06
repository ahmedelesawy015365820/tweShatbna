<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisingSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertising_sizes', function (Blueprint $table) {
            $table->id();
            $table->double('width',4,2);
            $table->double('height',4,2);
            $table->double('resolution',4,2);
            $table->double('size');
            $table->foreignId('page_view_id')->constrained('advertising_page_advertising_views')->cascadeOnDelete();
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
        Schema::dropIfExists('advertising_sizes');
    }
}
