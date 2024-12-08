<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');  // 仅用户角色可以访问
    }

    public function index()
    {
        // 直接查询花卉数据，可以使用分页等方法来控制数据量
        $flowerData = Flower::select('id', 'name', 'price', 'description', 'image')->get(); // 获取所有花卉数据
        
        // 确保数据成功获取
        if ($flowerData->isEmpty()) {
            \Log::info('No flowers found in the database.');
        }

        // 返回视图，并传递获取的花卉数据
        return view('user-dashboard', ['flowerData' => $flowerData]);
    }
}
