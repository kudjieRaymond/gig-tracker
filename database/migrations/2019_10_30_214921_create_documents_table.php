<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
						$table->bigIncrements('id');
						$table->string('name')->nullable();
            $table->longText('description')->nullable();
						$table->timestamps();
						$table->softDeletes();
						$table->unsignedBigInteger('project_id')->nullable();
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
        Schema::dropIfExists('documents');
    }
}