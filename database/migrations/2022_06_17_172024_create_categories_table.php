<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->comment('카테고리 영어 이름');
            $table->string('name_ko')->comment('카테고리 한글 이름');
            $table->foreignIdFor(\App\Models\Office::class)->comment("office_id");
            $table->unsignedBigInteger('parents')->default(null)->comment('하위 카테고리인 경우 부모 id를 참조');
            $table->boolean('is_show')->default(false)->comment('공개 여부');
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
        Schema::dropIfExists('categories');
    }
};
