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
        Schema::table('shipments', function (Blueprint $table) {
            $table->integer('number')->after('id');
            $table->unsignedBigInteger('user_id')->after('number');
            $table->unsignedBigInteger('company_id')->after('user_id');
            $table->unsignedBigInteger('shipment_type_id')->after('company_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->dropColumn('number');
            $table->dropColumn('user_id');
            $table->dropColumn('company_id');
            $table->dropColumn('shipment_type_id');
        });
    }
};
