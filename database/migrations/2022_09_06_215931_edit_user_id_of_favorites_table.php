<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditUserIdOfFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->foreignId('user_id') 
                ->constrained() 
                ->onDelete('cascade');

        $table->foreignId('shop_id') 
                ->constrained() 
                ->onDelete('cascade');
    }
}
