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
            $table->integer('id')->autoIncrement();
            $table->string('type');
            $table->string('slug');
            $table->string('url');
            $table->string('bitly_url');
            $table->string('embed_url');
            $table->string('username');
            $table->string('source');
            $table->string('content_url')->nullable();
            $table->string('source_post_url');
            $table->dateTime('update_datetime');
            $table->dateTime('create_datetime');
            $table->dateTime('import_datetime');
            $table->dateTime('trending_datetime');
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
