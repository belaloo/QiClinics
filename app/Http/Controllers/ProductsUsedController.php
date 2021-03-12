<?php

namespace App\Http\Controllers;

use App\Models\ProductsUsed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsUsedController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            $products = ProductsUsed::where('is_deleted', 0)->get();

            return $this->apiResponse($products);
        } else return $this->unAuthoriseResponse();
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ProductsUsed $productsUsed
     * @return \Illuminate\Http\Response
     */
    public function show(ProductsUsed $productsUsed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ProductsUsed $productsUsed
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductsUsed $productsUsed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductsUsed $productsUsed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductsUsed $productsUsed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ProductsUsed $productsUsed
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductsUsed $productsUsed)
    {
        //
    }
}
