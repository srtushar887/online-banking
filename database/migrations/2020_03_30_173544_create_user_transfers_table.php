<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_transfers', function (Blueprint $table) {
            $table->id();
            $table->string('amount')->nullable();
            $table->string('reciver_account_number')->nullable();
            $table->string('receiver_name')->nullable();
            $table->string('sender_account_nubmber')->nullable();
            $table->string('transfer_date')->nullable();
            $table->text('description')->nullable();
            $table->string('transfer_type')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('user_transfers');
    }
}
