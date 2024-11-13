<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $queryParams = $request->query();
        $tags = DB::table('tags AS t')
            ->selectRaw('*, if(t.group_id is null, t.id, t.group_id) as group_reference')
            ->orderBy('group_reference')
            ->orderByRaw("type <> 'group'");

        $searchParams = array_filter($queryParams, fn($item) => $item !== null);

        if (count($searchParams) && isset($searchParams['q'])) {
            $tags->where('id', 'like', "%$searchParams[q]%")
                ->orWhere('name', 'like', "%$searchParams[q]%");
        }

        $tags = $tags->orderBy('group_id')->get();

        $groups = $tags->filter(fn($tag) => $tag->type === 'group');
        $tagNames = $tags->filter(fn($tag) => $tag->type === 'tag_name');

        if (auth()->user()->hasRole('Admin')) {
            return view('pages.admin.tags.index', ['tagNames' => $tagNames, 'groups' => $groups, 'tags' => $tags]);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($data['type'] === 'tag_name' && !$data['group_id']) {
            $request->session()->flash('error', 'Não é possível cadastrar uma etiqueta sem que ela pertença a algum grupo.');
            return redirect()->route('tag.list');
        }

        $entity = Tag::create($data);

        if (!$entity) {
            throw new \InvalidArgumentException("Não foi possível cadastrar o novo registro de etiqueta.");
        }

        return redirect()->route('tag.list');
    }

    public function edit(Tag $tag) {
        return response()->json(['data' => $tag]);
    }
}
