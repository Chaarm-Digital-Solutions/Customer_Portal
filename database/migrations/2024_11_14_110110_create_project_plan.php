<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('project_plans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id');
            $table->string('task_id')->unique(); // For Gantt chart reference
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('progress')->default(0);
            $table->string('dependencies')->nullable();
            $table->boolean('is_milestone')->default(false);
            $table->string('custom_class')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_plans');
    }
};