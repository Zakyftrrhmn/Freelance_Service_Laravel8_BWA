<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyThumbnailService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thumbnail_service', function (Blueprint $table) {
            $table->foreign("service_id","fk_thumbnail_service_to_service")->references("id")->on("service")->onUpdate("CASCADE")->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thumbnail_service', function (Blueprint $table) {
            $table->dropForeign("fk_thumbnail_service_to_service");
        });
    }
}
