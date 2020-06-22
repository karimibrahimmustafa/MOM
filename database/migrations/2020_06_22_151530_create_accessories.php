<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories', function (Blueprint $table) {
            $table->string('A_Qr_code',100);
            $table->string('Custom_code');
            $table->primary('A_Qr_code');
            $table->timestamps();
        });

        Schema::create('add_accessories', function (Blueprint $table) {
            $table->string('A_Qr_code',100);
            $table->string('P_code',50);
            $table->primary(['A_Qr_code', 'P_code']);
            $table->foreign('P_code')->references('P_code')->on('products');
            $table->integer('Quantity');
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
        Schema::dropIfExists('accessories');
        Schema::dropIfExists('add_accessories');
    }
}
