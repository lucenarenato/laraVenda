<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductsTags;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->user()->hasRole('Admin')) {
            $queryParams = $request->query();
            $products = Product::query();

            $searchParams = array_filter($queryParams, fn($item) => $item !== null);

            if (count($searchParams) && isset($searchParams['q'])) {
                $products->where('products.id', 'like', "%$searchParams[q]%")
                    ->orWhere('products.sku', 'like', "%$searchParams[q]%")
                    ->orWhere('products.name', 'like', "%$searchParams[q]%");
            }

            if (isset($queryParams['categories'])) {
                $products->join('products_tags', 'products.id', 'products_tags.product_id')
                    ->whereIn('products_tags.tag_id', $queryParams['categories'])
                    ->select([
                        'products.id',
                        'products.name',
                        'products.cost_price',
                        'products.sell_price',
                        'products.sku',
                        'products.image',
                        'products.description'
                        ])
                    ->groupBy('products.id');
            }

            $products = $products->withTrashed()->get();

            $tags = Tag::all()->keyBy('id');

            $groups = $tags->filter(fn($item) => $item->type === 'group');
            $tag_names = $tags->filter(fn($item) => $item->type === 'tag_name');

            $tagGroups = [];

            foreach ($tag_names as $tag) {
                $group = $tag->group_id;
                $tagGroups[$groups[$group]->name][] = $tag;
            }

            return view('pages.admin.products.index', [
                'products' => $products,
                'tagGroups' => $tagGroups,
            ]);
        }
    }

    public function create()
    {
        if (auth()->user()->hasRole('Admin')) {
            $tags = Tag::all()->keyBy('id');

            $groups = $tags->filter(fn($item) => $item->type === 'group');
            $tag_names = $tags->filter(fn($item) => $item->type === 'tag_name');

            $tagGroups = [];

            foreach ($tag_names as $tag) {
                $group = $tag->group_id;
                $tagGroups[$groups[$group]->name][] = $tag;
            }

            return view('pages.admin.products.new', [
                'tagGroups' => $tagGroups,
            ]);
        }
    }

    public function store(Request $request)
    {
        if (auth()->user()->hasRole(['Admin', 'Warehouse'])) {
            $data = $request->all();
            $moneyFields = ['cost_price', 'sell_price'];

            foreach ($moneyFields as $index) {
                if (isset($data[$index])) {
                    $data[$index] = floatval(str_replace(',', '.', str_replace('.', '', $data[$index])));
                }
            }

            $entity = Product::create($data);

            if (!$entity) {
                throw new \InvalidArgumentException("Não foi possível cadastrar o produto.");
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $hash = date('YmdHis').'_'.hash('md5', file_get_contents($file->getPathname()));

                $filename = $entity->id.'_'.$hash.'.'.$file->getClientOriginalExtension();
                $filepath = "products/images";

                $request->file('image')->storeAs("public/".$filepath, $filename);

                $entity->image = $filepath."/".$filename;
                $entity->save();
            }

            if (isset($data['categories'])) {
                $productTags = [];

                foreach($data['categories'] as $tagID) {
                    $productTags[] = [
                        'product_id' => $entity->id,
                        'tag_id' => $tagID,
                    ];
                }

                ProductsTags::insert($productTags);
            }

            return redirect()->route('product.list');
        }
    }

    public function edit(Product $product)
    {
        if (auth()->user()->hasRole(['Admin', 'Warehouse'])) {
            $tags = Tag::all()->keyBy('id');
            $productTags = ProductsTags::select('tag_id')
                    ->where('product_id', $product->id)
                    ->get()
                    ->toArray();

            $productTags = array_column($productTags, 'tag_id');

            $groups = $tags->filter(fn($item) => $item->type === 'group');
            $tag_names = $tags->filter(fn($item) => $item->type === 'tag_name');

            $tagGroups = [];

            foreach ($tag_names as $tag) {
                $group = $tag->group_id;
                $tagGroups[$groups[$group]->name][] = $tag;
            }

            return view('pages.admin.products.edit', [
                'product' => $product,
                'tagGroups' => $tagGroups,
                'productTags' => $productTags,
            ]);
        }
    }

    public function update(Request $request, Product $product)
    {
        if (auth()->user()->hasRole(['Admin', 'Warehouse'])) {
            $data = $request->all();
            $moneyFields = ['cost_price', 'sell_price'];

            foreach ($moneyFields as $index) {
                if (isset($data[$index])) {
                    $data[$index] = floatval(str_replace(',', '.', str_replace('.', '', $data[$index])));
                }
            }

            $product->fill($data);

            $entity = $product->save();

            if (!$entity) {
                throw new \InvalidArgumentException("Não foi possível editar o produto.");
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $hash = date('YmdHis').'_'.hash('md5', file_get_contents($file->getPathname()));

                $filename = $product->id.'_'.$hash.'.'.$file->getClientOriginalExtension();
                $filepath = "products/images";

                $request->file('image')->storeAs("public/".$filepath, $filename);

                $product->image = $filepath."/".$filename;
                $product->save();
            }

            $registeredProductTags = ProductsTags::select('tag_id')
                ->where('product_id', $product->id)
                ->get()
                ->toArray();

            if (count($registeredProductTags)) {
                $registeredProductTags = array_column($registeredProductTags, 'tag_id');
            }

            $productTagsToAdd = array_diff($data['categories'] ?? [], $registeredProductTags);
            $productTagsToRemove = array_diff($registeredProductTags, $data['categories'] ?? []);

            if (count($productTagsToAdd)) {
                $productTags = [];

                foreach($productTagsToAdd as $tagID) {
                    $productTags[] = [
                        'product_id' => $product->id,
                        'tag_id' => $tagID,
                    ];
                }

                ProductsTags::insert($productTags);
            }

            if (count($productTagsToRemove)) {
                ProductsTags::whereIn('tag_id', $productTagsToRemove)->delete();
            }

            return redirect()->route('product.list');
        }
    }

    public function changeStatus(Product $product)
    {
        $product->deleted_at ? $product->restore() : $product->delete();
    }

    public function delete(Product $product)
    {
        ProductsTags::where('product_id', $product->id)->delete();
        $product->forceDelete();
    }
}
