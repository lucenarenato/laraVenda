<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        $queryParams = $request->query();
        $products = Product::query();

        $searchParams = array_filter($queryParams, fn($item) => $item !== null);

        if (count($searchParams) && isset($searchParams['q'])) {
            $products->where('id', 'like', "%$searchParams[q]%")->orWhere('sku', 'like', "%$searchParams[q]%");
        }

        $products = $products->withTrashed()->get();

        if (auth()->user()->hasRole('Admin')) {
            return view('pages.admin.products.index', ['products' => $products]);
        }
    }

    public function create() {
        if (auth()->user()->hasRole('Admin')) {
            return view('pages.admin.products.new');
        }
    }

    public function store(Request $request) {
        if (auth()->user()->hasRole(['Admin', 'Warehouse'])) {
            $data = $request->all();
            $entity = Product::create($data);

            if (!$entity) {
                throw new \InvalidArgumentException("Não foi possível cadastrar o produto.");
            }

            return redirect()->route('product.list');
        }
    }

    public function edit(Product $product) {
        if (auth()->user()->hasRole(['Admin', 'Warehouse'])) {
            return view('pages.admin.products.edit', ['product' => $product]);
        }
    }

    public function update(Request $request, Product $product) {
        if (auth()->user()->hasRole(['Admin', 'Warehouse'])) {
            $data = $request->all();
            $product->fill($data);

            $product->save();

            return redirect()->route('product.list');
        }
    }

    public function changeStatus(Product $product) {
        $product->deleted_at ? $product->restore() : $product->delete();
    }

    public function delete(Product $product) {
        $product->forceDelete();
    }
}
