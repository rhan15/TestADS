<?php

namespace App\Http\Controllers\ProductAsset;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\ProductAsset;
use Illuminate\Http\Request;

class ProductAssetController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productAsset = ProductAsset::all();

        return $this->showAll($productAsset);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductAsset  $productAsset
     * @return \Illuminate\Http\Response
     */
    public function show(ProductAsset $productAsset)
    {
        return $this->showOne($productAsset);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductAsset  $productAsset
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAsset $productAsset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductAsset  $productAsset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAsset $productAsset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductAsset  $productAsset
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAsset $productAsset)
    {
        $productAsset->delete();
        

        return $this->showOne($productAsset);
    }
}
