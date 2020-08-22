<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columns', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('writer_name')->nullable();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->text('long_title')->nullable();
            $table->text('body')->nullable();
            $table->boolean('publish')->default(1);
            $table->uuid('writer_id');
            $table->uuid('user_id');
            $table->timestamps();


            $table->foreign('writer_id')
            ->references('id')
            ->on('writers')
            ->onDelete('cascade');

            
            $table->foreign('user_id')
            ->references('id')
            ->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('columns');
    }
}
