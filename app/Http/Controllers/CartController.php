<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::instance(Auth::user()->id)->content();

        $total = 0;
        $has_carriage_cost = false;
        $carriage_cost = 0;

        foreach ($carts as $cart) {
            $total += $cart->qty * $cart->price;
            //送料ありの商品があった時だけtrue
            if ($cart->options->carriage) {
                $has_carriage_cost = true;
            }
        }

        if($has_carriage_cost) {
            $total += env('CARRIAGE');
            $carriage_cost = env('CARRIAGE');
        }

        return view('carts.index', compact('carts', 'total', 'carriage_cost'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cart::instance(Auth::user()->id)->add(
            [
                'id' => $request->id, 
                'name' => $request->name, 
                'qty' => $request->qty, 
                'price' => $request->price, 
                'weight' => $request->weight,
                'options' => [
                    'image' => $request->image,
                    'carriage' => $request->carriage,
                ]
            ] 
        );

        return to_route('products.show', $request->get('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user_shoppingcarts = DB::table('shoppingcart')->get();
        $number = DB::table('shoppingcart')->where('instance', Auth::user()->id)->count();

        $count = $user_shoppingcarts->count();

        $count += 1;
        $number += 1;
        $carts = Cart::instance(Auth::user()->id)->content();

        $price_total = 0;
        $qty_total = 0;
        $has_carriage_cost = false;

        foreach ($carts as $cart) {
            $price_total += $cart->qty * $cart->price;
            $qty_total += $cart->qty;
            if ($cart->options->carriage) {
                $has_carriage_cost = true;
            }
        }

        if($has_carriage_cost) {
            $price_total += env('CARRIAGE');
        }

        Cart::instance(Auth::user()->id)->store($count);

        DB::table('shoppingcart')->where('instance', Auth::user()->id)
            ->where('number', null)
            ->update(
                [
                    'code' => substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 10),
                    'number' => $number,
                    'price_total' => $price_total,
                    'qty' => $qty_total,
                    'buy_flag' => true,
                    'updated_at' => date("Y/m/d H:i:s")
                ]
            );
        
        $pay_jp_secret = env('PAYJP_SECRET_KEY');
        \Payjp\Payjp::setApiKey($pay_jp_secret);

        $user = Auth::user();

        $res = \Payjp\Charge::create(
            [
                "customer" => $user->token,
                "amount" => $price_total,
                "currency" => 'jpy'
            ]
        );

        Cart::instance(Auth::user()->id)->destroy();

        return to_route('carts.index');
    }

    public function remove($rowId) {
        // dd(Cart::instance(Auth::user()->id)->content());

        $items = Cart::instance(Auth::user()->id)->content();
        foreach($items as $item) {
            if($item->rowId == '$rowId') {
                $rowId = $item->rowId;
                break;
            }
        }
        Cart::remove($rowId);
        return back();
    }
}
