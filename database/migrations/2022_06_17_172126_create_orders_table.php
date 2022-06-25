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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->comment('직원 ID');
            $table->foreignIdFor(\App\Models\Product::class)->comment('상품 ID');
            $table->json('options')->nullable()->comment('옵션');
            // enum 으로 들어 갈지 고민중. 굳이?
            $table->boolean('status')->default(false)->comment('주문 상태(true 조리 완료)');
            $table->boolean('star')->default(false)->comment('주문 음료를 북마크로');
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
        Schema::dropIfExists('orders');
    }
};
