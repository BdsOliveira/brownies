<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->renameColumn('id_seller', 'seller_id');
            $table->renameColumn('quantitySold', 'quantity');
            $table->renameColumn('dateSell', 'date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->renameColumn('seller_id', 'id_seller');
            $table->renameColumn('quantity', 'quantitySold');
            $table->renameColumn('date', 'dateSell');
        });
    }
};
