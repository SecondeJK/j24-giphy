<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMediaEntityMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->integer('media_id')->autoIncrement();
            $table->string('type');
            $table->string('id');
            $table->string('slug');
            $table->string('url');
            $table->string('bitly_url');
            $table->string('embed_url');
            $table->string('username');
            $table->string('source');
            $table->string('content_url')->nullable();
            $table->string('source_post_url');
            // NB API docs wrong, missing column but leaving on in case v2 changes this.
            $table->dateTime('update_datetime')->nullable();
            $table->dateTime('create_datetime')->nullable();
            $table->dateTime('import_datetime');
            $table->dateTime('trending_datetime')->nullable();
            $table->string('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('media');
    }
}
