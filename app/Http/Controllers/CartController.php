<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Сделать более оптимальный запрос к БД
    public function showCart()
    {
        $userId = auth()->user()->getAuthIdentifier();
        $carts = Cart::where('user_id', $userId)->get(); // Получили все товары пользователя из корзины
        foreach ($carts as $cart) { // Добавили к товарам название, цену и картинку
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
        $cart->save();
        return redirect()->intended('/cart');
    }
}
