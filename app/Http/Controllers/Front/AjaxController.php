<?php

namespace App\Http\Controllers\Front;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function addToCart($product_id)
    {
//        session()->remove('cart');
        $product = Product::findOrFail($product_id);
        if($product->stock > 0) {
            $sesionData['product_id'] = $product->id;
            $sesionData['name'] = $product->name;
            $sesionData['quantity'] = 1;
            $sesionData['price'] = $product->price;
            $sesionData['image'] = isset($product->product_image[0]) ? $product->product_image[0]->file_path : 'assets/frontend/images/products/no-image-available.png';
            session()->push('cart', $sesionData);

        }
        $data['cart'] = session('cart');

        $data['headerCartDetailsView'] = view('front.ajax.headerCartDetails',$data)->render();

        return $data;
    }
}
