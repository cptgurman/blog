<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('post_id');

            $table->timestamps();

            //Создаем наименование IDX
            $table->index('tag_id', 'post_tag_tag_idx'); //Типо таблица откуда -> куда ссылаемся
            $table->index('post_id', 'post_tag_post_idx');

            //Создаем наименование FK + таблица на которую ссылаемся + поле в этой таблице
            $table->foreign('tag_id', 'post_tag_tag_fk')->on('tags')->references('id');
            $table->foreign('post_id', 'post_tag_post_fk')->on('posts')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tags');
    }
}
