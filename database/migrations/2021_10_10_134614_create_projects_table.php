<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('category_id')->index();
            $table->foreignId('group_id')->index();
            $table->longText('description')->nullable();
            $table->timestamp('start_at')->nullable();
            $table->timestamp('finish_at')->nullable();
            $table->timestamp('real_start_at')->nullable();
            $table->timestamp('real_finish_at')->nullable();
            $table->string('code')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('sort')->nullable();
            $table->longText('image')->nullable();
            $table->longText('note')->nullable();
            $table->longText('options')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
