<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->nullable()->index("fk_service_to_users");
            $table->string("title");
            $table->longText("description")->nullable();
            $table->integer("delivery_time")->nullable();
            $table->integer("revision_limit")->nullable();
            $table->string("price")->nullable();
            $table->longText("note")->nullable();
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
        Schema::dropIfExists('service');
    }
}
