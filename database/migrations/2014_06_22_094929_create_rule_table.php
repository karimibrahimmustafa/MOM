<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::create('rules', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name')->unique();
                $table->rememberToken();
                $table->timestamps();
            });
            Schema::create('actions', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('discription');
                $table->rememberToken();
                $table->timestamps();
            });
            Schema::create('rule_action', function (Blueprint $table) {

                $table->integer('rule')->unsigned();
            
                $table->integer('action')->unsigned();
            
                $table->foreign('rule')->references('id')->on('rules')
            
                    ->onDelete('cascade');
            
                $table->foreign('action')->references('id')->on('actions')
            
                    ->onDelete('cascade');
            
            });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actions');
        Schema::dropIfExists('rules');
        Schema::dropIfExists('rule_action');
    }
}
