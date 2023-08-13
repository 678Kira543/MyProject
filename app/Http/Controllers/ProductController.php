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
        $description = $request->descriptionField;
        $product = new \App\Models\Product();
        $product->title = $title;
        $product->cost = $cost;
        $product->description = $description;
        $product->author_id = 2;
        $product->save();
        return redirect()->intended('/addProduct');
    }

    public function showProductById(Request $request)
    {
        $productId = $request->id;
        $product = Product::where('id', $productId)->first();
        $reviews = Review::where('product_id', $productId)->get();
        $userId = auth()->user()->getAuthIdentifier();
        $bindRole = BindRole::where('user_id', $userId)->first();
        $isAdmin = $bindRole->role_id == 2;
        return view('pages.product', ['product' => $product, 'reviews' => $reviews, 'isAdmin' => $isAdmin]);
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
