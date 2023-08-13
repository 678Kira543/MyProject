<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\BindRole;
use App\Models\Review;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        $title = $request->title;
        $cost = $request->cost;
        $author = $request->author;
        $img1 = $request->img1;
        $img2 = $request->img2;
        $img3 = $request->img3;
        $description = $request->description;
        $product = new Product();
        $product->title = $title;
        $product->cost = $cost;
        $product->author = $author;
        $product->img1 = $img1;
        $product->img2 = $img2;
        $product->img3 = $img3;
        $product->description = $description;
        $product->save();
        return redirect()->intended('/mainPage');
    }

    public function showProductById(Request $request)
    {
        $productId = $request->id;
        $product = Product::where('id', $productId)->first();
        $reviews = Review::where('product_id', $productId)->get();
        $userId = auth()->user()->getAuthIdentifier();
        if(BindRole::where('user_id', $userId)->first()){
            $bindRole = BindRole::where('user_id', $userId)->first();
            $isAdmin = $bindRole->role_id == 2;
            return view('pages.product', ['product' => $product, 'reviews' => $reviews, 'isAdmin' => $isAdmin]);
        }
        return view('pages.product', ['product' => $product, 'reviews' => $reviews, 'isAdmin' => '']);
    }

    public function addReview(Request $request)
    {
        $userId = auth()->user()->getAuthIdentifier();
        $reviewField = $request->review;
        $productId = $request->product_id;
        $review = new Review();
        $review->product_id = $productId;
        $review->user_id = $userId;
        $review->review = $reviewField;
        $review->save();
        return redirect()->intended('/product/' . $productId);
    }

    public function showAllProduct()
    {
        $products = \App\Models\Product::all();
        foreach ($products as $product) {
            $authorId = $product->author_id;
            $product->author = \App\Models\User::where('id', $authorId)->first();
        }
        return view('pages.mainPage', ['products' => $products]);
    }

    public function deleteReview(Request $request)
    {
        $reviewId = $request->id;
        $review = Review::where('id', $reviewId)->first();
        $userId = auth()->user()->getAuthIdentifier();
        $bindRole = BindRole::where('user_id', $userId)->first();
        $isAdmin = $bindRole->role_id == 2;
        if ($isAdmin or $userId == $review->user_id) {
            $review->delete();
        }
        $productId = $review->product_id;
        return redirect()->intended('/product/' . $productId);
    }
}
