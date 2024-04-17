<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->foreignId("service_id")->nullable()->index("fk_order_to_service");
            $table->foreignId("buyer_id")->nullable()->index("fk_order_buyer_to_service");
            $table->foreignId("freelance_id")->nullable()->index("fk_order_freelance_to_service");
            $table->longText("file")->nullable();
            $table->longText("note")->nullable();
            $table->date("expired")->nullable();
            $table->foreignId("order_status_id")->nullable()->index("fk_order_to_order_status");
            $table->softDeletes();
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
        Schema::dropIfExists('order');
    }
}
