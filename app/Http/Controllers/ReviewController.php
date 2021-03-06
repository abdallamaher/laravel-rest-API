<?php

namespace App\Http\Controllers;

use App\Model\Review;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ReviewResource;

class ReviewController extends Controller
{
    
    public function index(Product $product)
    {
        return ReviewResource::collection($product->reviews);
    }
    
}
