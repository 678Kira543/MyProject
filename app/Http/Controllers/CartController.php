<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartStatus;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Сделать более оптимальный запрос к БД
    public function showCart()
    {
        $userId = auth()->user()->getAuthIdentifier();
        $carts = Cart::where(['user_id'=>$userId, 'status'=>1])->get();
        foreach ($carts as $cart) {
            $product = Product::where('id', $cart->product_id)->first();
            $cart->name = $product->title;
            $cart->author = $product->author;
            $cart->cost = $product->cost;
            $cart->img1 = $product->img1;
        }
        // Рендерим результат
        return view('pages.cart', ['carts' => $carts]);
    }

    public function addProductInCart(Request $request)
    {
        $productId = $request->product_id;
        $userId = auth()->user()->getAuthIdentifier();
        $cart = new Cart();
        $cart->product_id = $productId;
        $cart->user_id = $userId;
        $cart->quantity = 1;
        $cart->status = 1;
        $cart->save();
        return redirect()->intended('/cart');
    }
    public function changeQuantity(Request $request)
    {
        $cartId = $request->cartId;
        $quantity =$request->quantity;
        $cart = Cart::where('id', $cartId)->first();
        $cart->quantity = $quantity;
        $cart->save();
        return json_encode(['result'=>'success']);
    }
    public function continueShopping()
    {
        $userId = auth()->user()->getAuthIdentifier();
        $carts = Cart::where(['user_id'=>$userId, 'status'=>1])->update(['status'=>2]);
        return redirect()->intended('/myOrders');
    }
    public function showMyOrders()
    {
        $userId = auth()->user()->getAuthIdentifier();
        $carts = Cart::where('user_id', $userId)->get(); // Получили все товары пользователя из корзины
        foreach ($carts as $cart) { // Добавили к товарам название, цену и картинку
            $product = Product::where('id', $cart->product_id)->first();
            $status = CartStatus::where('id', $cart->status)->first();
            $cart->name = $product->title;
            $cart->author = $product->author;
            $cart->cost = $product->cost;
            $cart->img1 = $product->img1;
            $cart->status = $status->name;
        }
        return view('pages.MyOrders', ['carts'=>$carts]);
    }
    public function showAllOrders(){
        $carts = Cart::all();
        $statuses = CartStatus::all();
        foreach ($carts as $cart) {
            $product = Product::where('id', $cart->product_id)->first();
            $cart->name = $product->title;
            $cart->author = $product->author;
            $cart->cost = $product->cost;
            $cart->img1 = $product->img1;
        }
        return view('dashboard', ['carts'=>$carts, 'statuses'=>$statuses]);
    }
    public function changeStatus(Request $request){
        $cartId = $request->cartId;
        $status = $request->status;
        Cart::where('id', $cartId)->update(['status'=>$status]);
        return json_encode(['result'=>'success']);
    }
}
