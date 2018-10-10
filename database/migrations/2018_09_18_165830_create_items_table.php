<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->string('name')->index();
            $table->unsignedInteger('age')->index();
            $table->string('school')->index();
            $table->timestamp('birthday')->index();
            $table->string('class')->index();
            $table->string('teacher')->index();
            $table->string('teacher_phone')->nullable();
            $table->string('teacher_email')->nullable();
            $table->string('parents');
            $table->string('parents_phone');
            $table->string('group')->index();
            $table->text('thought');
            $table->string('note')->nullable();

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
        Schema::dropIfExists('items');
    }
}
