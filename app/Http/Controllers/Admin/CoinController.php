<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderCoin;
use App\Models\User;
use Illuminate\Http\Request;

class CoinController extends Controller
{
    public function index()
    {
        $order_coins = OrderCoin::paginate(5);
        return view('admin.coins.index', [
            'title' => 'Quản lý coins',
            'order_coins' => $order_coins
        ]);
    }
    public function show($id){
        $order_coins=OrderCoin::find($id);
        return view('admin.coins.show',[
            'title'=>'Chi tiết hoá đơn',
            'order_coins'=>$order_coins
        ]);
    }

    public function confirm(Request $request, $id)
    {
        $order_coins = OrderCoin::findOrFail($id);
        $order_coins->status = "Đã xác nhận";
        $order_coins->save();

        $user = User::find($order_coins->user_id); // Sử dụng trường chính xác để tìm kiếm người dùng
        $user->coins = $order_coins->coins;
        $user->save();
        return redirect()->back();
    }
    public function cancel($id){
        $order_coins = OrderCoin::findOrFail($id);
        $order_coins->status = "Đã huỷ";
        $order_coins->save();
        return redirect()->back();

    }
}
