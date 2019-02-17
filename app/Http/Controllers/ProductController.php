<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth:api')->except('index','show');
    }
    
    public function index()
    {
        return Product::paginate(20);
        //return ProductResource::collection(Product::paginate(20));
        //return ProductCollection::collection(Product::paginate(20));
    }
    
    public function create()
    {
        //
    }
    
    public function store(ProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->detail = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->discount = $request->discount;
        return response([
        	'data' => new ProductResource($product)
        ],Response::HTTP_CREATED);
    }

    
    public function show(Product $product)
    {
        return new ProductResource($product);
    }
    
    
    public function update(Request $request, Product $product)
    {
    	$request['detail'] = $request->description;
        unset($request['description']);
        $product->update($request->all());
        return response([
            'data' => new ProductResource($product)
        ],Response::HTTP_CREATED);
    }

    
    public function destroy(Product $product)
    {
        $product->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
