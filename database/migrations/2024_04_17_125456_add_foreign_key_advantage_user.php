<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyAdvantageUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advantage_user', function (Blueprint $table) {
            $table->foreign("service_id","fk_advantage_user_to_service")->references("id")->on("service")->onUpdate("CASCADE")->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advantage_user', function (Blueprint $table) {
            $table->dropForeign("fk_advantage_user_to_service");
        });
    }
}
