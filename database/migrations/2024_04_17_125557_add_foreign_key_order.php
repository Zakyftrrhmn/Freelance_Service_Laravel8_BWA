<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order', function (Blueprint $table) {
            $table->foreign("service_id","fk_order_to_service")->references("id")->on("service")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->foreign("buyer_id","fk_order_buyer_to_service")->references("id")->on("users")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->foreign("freelance_id","fk_order_freelance_to_service")->references("id")->on("users")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->foreign("order_status_id","fk_order_to_order_status")->references("id")->on("order_status")->onUpdate("CASCADE")->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order', function (Blueprint $table) {
            $table->dropForeign("fk_order_to_service");
            $table->dropForeign("fk_order_buyer_to_service");
            $table->dropForeign("fk_order_freelance_to_service");
            $table->dropForeign("fk_order_to_order_status");
        });
    }
}
