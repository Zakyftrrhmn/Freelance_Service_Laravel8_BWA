<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyExperienceUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experience_user', function (Blueprint $table) {
            $table->foreign("detail_user_id","fk_experience_user_to_detail_user")->references("id")->on("detail_user")->onUpdate("CASCADE")->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('experience_user', function (Blueprint $table) {
            $table->dropForeign("fk_experience_user_to_detail_user");
        });
    }
}
