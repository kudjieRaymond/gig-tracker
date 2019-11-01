<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
						$table->bigIncrements('id');
						$table->decimal('amount', 15, 2)->nullable();
            $table->date('transaction_date')->nullable();
            $table->string('name')->nullable();
						$table->longText('description')->nullable();
						$table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('transaction_type_id')->nullable();
            $table->unsignedBigInteger('income_source_id')->nullable();
						$table->unsignedBigInteger('currency_id')->nullable();
						$table->unsignedBigInteger('created_by')->nullable();

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
        Schema::dropIfExists('transactions');
    }
}