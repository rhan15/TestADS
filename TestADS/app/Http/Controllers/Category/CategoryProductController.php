<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAsset;
use Illuminate\Http\Request;

class CategoryProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $products = $category->products;

        return $this->showAll($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category, Product $product, ProductAsset $productAsset)
    {
        $rules =[
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required|integer|min:500',
            'image' => 'required|image',
        ];
        $this->validate($request, $rules);

        $data = $request->all();

        
        
        // $datas['image'] = $request->image->store('');
        // $datas['product_id'] = $product->id;

        $data['category_id'] = $category->id;
        $data['product_id'] = $product->id;


        $productAsset = ProductAsset::create([
            'product_id' => $category->products->id,
            'image' => $request->image->store(''),
        ]);

        $products = Product::create($data);

        return $this->showOne($products);  
    
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
