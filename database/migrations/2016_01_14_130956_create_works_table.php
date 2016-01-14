<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('thumbnail');
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('SET NULL');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('works', function (Blueprint $table)
        {
            $table->dropForeign('works_category_id_foreign');
            $table->dropForeign('works_user_id_foreign');
        });

        Schema::drop('works');
    }
}
