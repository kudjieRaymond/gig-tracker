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
						$table->bigIncrements('id');
						$table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->date('start_date')->nullable();
            $table->float('budget', 15, 2)->nullable();
            $table->softDeletes();
						$table->timestamps();
						$table->unsignedBigInteger('status_id')->nullable();
						$table->unsignedBigInteger('client_id')->nullable();
						$table->unsignedBigInteger('created_by')->nullable();

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