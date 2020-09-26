<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinPurchaseTable extends Migration
{
    /**
     * Run the migrations.
     * This table when other coins (bitcoin, ethereum, etc) are used to purchase Faruna Coin
     * @return void
     */
    public function up()
    {
        Schema::create('coin_purchase', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('coin_type')->default('BITCOIN');
            $table->string('sender_address');
            $table->string('fac_amount');
            $table->string('status')->default('PENDING');
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
        Schema::dropIfExists('coin_purchase');
    }
}
