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

        if (count($searchParams)) {
            $products->where('id', $searchParams['q'])->orWhere('sku', $searchParams['q']);
        }

        $products = $products->get();

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
}
