<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('product', compact('products'));
    }
    public function addToCart(Request $request){
        $user = Auth::user();
        if($user){
            $cart = new Cart;
            $cart->user_id = $user->id;
            $cart->product_id = $request->product_id;
            $cart->save();
            return redirect('/');
        }
        return redirect()->route('login');
    }
    static function CartItem()
    {
        return Cart::where('user_id',Auth::user()->id)->count();
        
    }
    public function cartList()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('cartlist', compact('carts'));
    }
    public function remove($id)
    {
        Cart::destroy($id);
        return redirect()->back();

    }
    public function ordernow()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $total = 0;
        foreach($carts as $cart)
        {
            $total+=$cart->products->price;
        }
        return view('order', compact('total'));
    }
    function search(Request $request)
    {
        $data= Product::where('name', 'like', '%'.$request->input('query').'%')->get();
        return view('search',compact('data'));
    }
    public function OrderPlace(Request $request)
    {
        $request->validate([
            'address'=>'required',
            'payment'=>'required'
        ]);
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        foreach($carts as $cart){
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->product_id = $cart->products->id;
            $order->status = 1;
            $order->payment_method = $request->payment;
            $order->payment_status = 'tolandi';
            $order->address = $request->address;
            $order->save();
            Cart::where('user_id', Auth::user()->id)->delete();
        }
        return redirect()->route('index');

    }
    
    public function myOrder()
    {
        $myorders = Order::where('user_id', Auth::user()->id)->get();
        return view('myorders', compact('myorders'));
    }
}
