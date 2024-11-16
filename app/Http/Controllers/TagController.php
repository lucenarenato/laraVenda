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
        $searchParams = array_filter($queryParams, fn($item) => $item !== null);

        $tagsWhere = "";
        $countRefAnd = "";
        $tableResultWhere = "";

        $input = [];

        if (count($searchParams) && isset($searchParams['q'])) {
            $tagsWhere = "WHERE (t.name LIKE :whereName OR t.type LIKE 'group')";
            $countRefAnd = "AND t2.name LIKE :countRefWhereName";
            $tableResultWhere = "WHERE table_result.name LIKE :tableResultName OR table_result.count_reference > 0";

            $input[':countRefWhereName'] = "%".$searchParams['q']."%";
            $input[':whereName'] = "%".$searchParams['q']."%";
            $input[':tableResultName'] = "%".$searchParams['q']."%";
        }

        $sql = "
            SELECT * FROM (
                SELECT *, IF(t.group_id IS NULL, t.id, t.group_id) AS group_reference,
                (SELECT COUNT(group_id) FROM tags t2 WHERE t2.group_id = t.id $countRefAnd) AS count_reference
                FROM tags t
                $tagsWhere
                ) AS table_result
            $tableResultWhere
            ORDER BY group_reference,
            TYPE <> 'group';
        ";

        $tags = DB::select($sql, $input);

        $groups = array_filter($tags, (fn($tag) => $tag->type === 'group'));
        $tagNames = array_filter($tags, (fn($tag) => $tag->type === 'tag_name'));

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

    public function edit(Tag $tag)
    {
        return response()->json(['data' => $tag]);
    }

    public function update(Request $request, Tag $tag)
    {
        if (auth()->user()->hasRole('Admin')) {
            $data = $request->all();

            if (!isset($data['group_id']) || (int) $data['group_id'] !== $tag->id) {
                if ($data['type'] !== 'tag_name') {
                    $data['group_id'] = null;
                }

                $tag->fill($data);
                $tag->save();
            }

            return redirect()->route('tag.list');
        }
    }

    public function delete(Tag $tag)
    {
        if (auth()->user()->hasRole('Admin')) {
            if ($tag->type === 'group') {
                Tag::where('group_id', $tag->id)->delete();
            }

            $tag->delete();
        }
    }
}
