<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collates', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
			$table->unsignedInteger('user_id')->index()->default(0)->comment('用户 id');
			$table->unsignedInteger('collate_id')->index()->default(0)->comment('文章 id/评论 id');
			$table->string('collate_type')->index()->default('')->comment('收藏类型');
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
        Schema::dropIfExists('collates');
    }
}
