<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    use HasFactory;

    // 指定模型对应的数据库表名称（如果不是默认的 flowers）
    protected $table = 'flowers';

    // 定义可以批量赋值的字段
    protected $fillable = [
        'name', 'price', 'description', 'image'
    ];
}
