<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAsset;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $product = Product::with('productAssets')->get();

        return $this->showAll($product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category, Product $product)
    {
        $rules = [
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required|integer|min:500',
            'image' => 'required|image',
        ];
        $this->validate($request, $rules);

        $data = $request->all();

        // dd($product->id);
        // $data['product_id'] = $product->id;

        $data['category_id'] = $category->id;

        //$data['product_id'] = $product->id;


        $productAsset = ProductAsset::create([
            'product_id' => $product->id,
            'image' => $request->image->store(''),
        ]);

        $products = Product::create($data);

        return $this->showOne($products);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        return $this->showOne($product);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->fill($request->only([
            'name',
            'slug',
            'price',
        ]));

        if ($product->isClean()) {
            return $this->errorResponse('Kamu harus menspesifikasi value yang berbeda untuk di update', 422);
        }

        $product->save();

        return $this->showOne($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, ProductAsset $productAsset)
    {
        // dd($product->id);
        ProductAsset::where('product_id', $product->id)->delete();
        $product->delete();
        

        return response()->noContent();
    }
}
