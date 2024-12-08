<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandyController extends Controller
{
   // 显示个人信息和网页主题
   public function showFlowerShop()
   {
       // 返回包含个人信息和主题的视图
       return view('flowerShop.index', [
           'student_id' => 'B01734499',
           'name' => 'Yuan Yin',
           'theme' => 'Flower Shop',
       ]);
   }
}