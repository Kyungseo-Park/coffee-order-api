<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 샷추가는 거의 모든 item 에들어가야하는데 N번 추가해야함.
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ko');
            $table->string('slug')->commnet("Slug");
            $table->string('thumbnail')->nullable()->comment('옵션 이미지');
            $table->unsignedBigInteger('sort')->default(0)->comment('정렬 순서');
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
        Schema::dropIfExists('options');
    }
};
