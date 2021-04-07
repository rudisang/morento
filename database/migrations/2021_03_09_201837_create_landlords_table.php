<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandlordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landlords', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable();
            $table->string('omang');
            $table->string('utility_doc');
            $table->string('occupation');
            $table->string('employer');
            $table->string('employer_email');
            $table->string('address');
            $table->text('bio');
            $table->text('message')->nullable();
            $table->integer('status_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('landlords');
    }
}
