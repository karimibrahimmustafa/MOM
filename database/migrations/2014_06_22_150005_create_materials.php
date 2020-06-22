<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->string('M_Qr_code',100);
            $table->string('Custom_code');
            $table->primary('M_Qr_code');
            $table->timestamps();
        });

        Schema::create('add_materials', function (Blueprint $table) {
            $table->string('M_Qr_code',100);
            $table->string('P_code',50);
            $table->primary(['M_Qr_code', 'P_code'],"MP");
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
        Schema::dropIfExists('materials');
        Schema::dropIfExists('add_materials');
    }
}
