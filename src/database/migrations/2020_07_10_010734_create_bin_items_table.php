<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bin_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("bin_id");
            $table->string('ip_address', 15);
            $table->string('method', 10);
            $table->string('url', 1024);
            $table->longText('header');
            $table->longText('content');
            $table->timestamps();

            $table->foreign('bin_id')
                ->references('id')->on('bins')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bin_items');
    }
}
