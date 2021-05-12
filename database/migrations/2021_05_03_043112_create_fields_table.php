<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->integer('form_id')->default(0)->nullable();
            $table->integer('type_id')->nullable();
            $table->string('name')->nullable();
            $table->string('help_text')->nullable();
            $table->string('placeholder')->nullable();
            $table->string('error_message')->nullable();
            $table->integer('sort')->nullable();
            $table->boolean('required')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('fields');
    }
}
