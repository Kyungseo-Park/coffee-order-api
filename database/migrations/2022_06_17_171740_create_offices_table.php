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
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('지점');
            $table->string('timezone')->default("Asia/Seoul")->comment("시간대");
            $table->string('address')->comment('주소');
            $table->foreignIdFor(\App\Models\User::class)->comment('소속 직원');
            $table->unsignedSmallInteger('open_time')->default(540)->comment('여는 시간 (1440 저장)');
            $table->unsignedSmallInteger('close_time')->default(800)->comment('닫는 시간 (1440 저장)');
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
        Schema::dropIfExists('offices');
    }
};
