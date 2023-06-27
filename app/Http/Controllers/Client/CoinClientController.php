<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\OrderCoin;
use Illuminate\Http\Request;

class CoinClientController extends Controller
{
    public function index()
    {
        return view('client.coins.index', [
            'title' => 'Nạp Coins',
            'genres' => Genre::all(),

        ]);
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $order_coin = new OrderCoin();
        $order_coin->last_name = $request->last_name;
        $order_coin->first_name = $request->first_name;
        $order_coin->email = $request->email;
        $order_coin->phone = $request->phone;
        $order_coin->coins = $request->coins;
        $order_coin->description = $request->description;
        $order_coin->payment = $request->payment;
        $order_coin->status = "Chờ xác nhận";
        $order_coin->user_id = $user->id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $order_coin->image = "/images/{$filename}";
        }
        $order_coin->save();

        return redirect()->back()->with('success', 'Gửi hoá đơn nạp xu thành công!');
    }

    public function show(){
        $order_coin=OrderCoin::where('user_id', auth()->user()->id)->get();
        return view('client.coins.show',[
            'title'=>'Lịch sử nạp xu',
            'order_coin'=>$order_coin,
            'genres' => Genre::all(),

        ]);
    }
}
