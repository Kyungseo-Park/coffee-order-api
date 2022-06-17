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
        Schema::create('product_options', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Product::class)->comment('상품 ID');
            $table->foreignIdFor(\App\Models\Option::class)->comment('옵션id');
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
        Schema::dropIfExists('product_options');
    }
};
