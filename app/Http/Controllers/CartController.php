<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loai_sp;
use App\Models\Donhang;
use App\Models\Donhangchitiet;

date_default_timezone_set('Asia/Ho_Chi_Minh');
class CartController extends Controller
{
    public function cartList() {
        $cartItems = \Cart::getContent();
        $loaisp = loai_sp::all();
        // dd($cartItems);
        return view('client.cart',['cartItems'=>$cartItems, 'loaisanpham'=>$loaisp]);
    }

    public function thanhtoan(){
        $cartItems = \Cart::getContent();
        $loaisp = loai_sp::all();
        return view('client.checkout',['cartItems'=>$cartItems, 'loaisanpham'=>$loaisp]);
    }

    public function thanhtoan1(Request $request){
        $cartItems = \Cart::getContent();
        $db = new Donhang;
        $db->name = $request->txtname;
        $db->phone = $request->txtphone;
        $db->email = $request->txtemail;
        $db->address = $request->txtaddress;
        $db->ngaydat = date("Y-m-d H:i:s");
        $db->trangthai = 0;
        $db->total = \Cart::getTotal();

        $data = $db->save();
        foreach ($cartItems as $sp){
            $db1 = new Donhangchitiet;
            $db1->iddon = $db->id;
            $db1->idsanpham = $sp->id;
            $db1->price = $sp->price;
            $db1->soluong = $sp->quantity;
            $db1->image = $sp->attributes->image;
            $db1->save();
        }
        \Cart::clear();
        return redirect()->route('client.index');
    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
