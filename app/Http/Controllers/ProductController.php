<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('admin/product/Index', [
            'products' => Product::with(['brand','categorie'])->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('admin/product/Create',[
            'categorys' => Category::get(),
            'brands' => Brand::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prodcut = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'numeric|required',
            'quantity' => 'required|integer',
            'description' => 'string|required',
            'status' => 'boolean|required',
            'thumb' => 'string|required',
            'categorie_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);
        
        Product::create($prodcut);

        return redirect()->route('product.index')->with('success', 'product create');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::with(['brand','categorie'])->findOrFail($id);

        return Inertia::render('admin/product/Create', [
            'product' => $product,
            'brands' => Brand::all(),
            'categorys'=> Category::all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $validate = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'numeric|required',
            'quantity' => 'required|integer',
            'description' => 'string|required',
            'status' => 'boolean|required',
            'thumb' => 'string|required',
        ]);
        $product->update($validate);

        return redirect()->route('product.index')->with('success', 'product create');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'product create');

    }
}
