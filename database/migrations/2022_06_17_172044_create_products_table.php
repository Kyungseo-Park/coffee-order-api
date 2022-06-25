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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Category::class);
            $table->string('name_en')->comment('카테고리 영어 이름');
            $table->string('name_ko')->comment('카테고리 한글 이름');
            $table->string('slug')->commnet("Slug");
            $table->boolean('is_delete')->default(false)->comment('삭제: API 에서 안 보내줌');
            $table->boolean('star')->default(true)->comment('신메뉴');
            $table->string('thumbnail')->comment('썸네일 필수(없으면 default api에서)');
            $table->unsignedTinyInteger('sort')->comment('정렬 순서(없을 경우 API에서 마지막에 추가');
            $table->enum('status', ['sell', 'suspend', 'be_sold', 'sold_out'])->default('be_sold')->comment('판매중, 판매중단, 출시예정, 품절');
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
        Schema::dropIfExists('products');
    }
};
