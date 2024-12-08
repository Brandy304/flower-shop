<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlowersTable extends Migration
{
    public function up()
    {
        Schema::create('flowers', function (Blueprint $table) {
            $table->id(); // 自动增加的 ID 字段
            $table->string('name'); // 花卉名称
            $table->decimal('price', 8, 2); // 花卉价格
            $table->text('description')->nullable(); // 花卉描述，允许为空
            $table->string('image')->nullable(); // 图片路径，允许为空
            $table->timestamps(); // 创建和更新时间
        });
    }

    public function down()
    {
        Schema::dropIfExists('flowers'); // 删除花卉表
    }
}
