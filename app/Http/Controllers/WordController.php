<?php

namespace App\Http\Controllers;

use App\Word;
use App\Tag;
use App\Http\Requests\WordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WordController extends Controller
{
    //
    public function index()
    {
        $words = Word::orderBy('created_at', 'desc')->paginate(10);

        return view('words.index', ['words' => $words]);
    }

    public function create()
    {
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });
 
        return view('words.create', [
            'allTagNames' => $allTagNames,
        ]);
    }

    public function store(WordRequest $request, Word $word)
    {
        $word->fill($request->all());
        $word->save();

        $request->tags->each(function ($tagName) use ($word) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $word->tags()->attach($tag);
        });

        return redirect()->route('words.index');
    }

    public function edit(Word $word)
    {
        $tagNames = $word->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('words.edit', [
            'word' => $word,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
        ]);
    }

    public function update(WordRequest $request, Word $word)
    {
        $word->fill($request->all())->save();

        $word->tags()->detach();
        $request->tags->each(function ($tagName) use ($word) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $word->tags()->attach($tag);
        });

        return redirect()->route('words.index');
    }

    public function destroy(Word $word)
    {
        $word->delete();
        return redirect()->route('words.index');
    }

    public function show(Word $word)
    {
        return view('words.show', ['word' => $word]);
    }

    public function search(Request $request)
    {
        if ($request->type === "0") {
            $word = Word::where('word', $request->word)->first();

            return view('words.show', ['word' => $word]);
        } elseif ($request->type === "1") {
            $words = Word::where('word', 'LIKE', "%$request->word%")
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
            return view('words.index', ['words' => $words]);
        } else {
            return redirect()->route('words.index');
        }
    }

    public function autocomplete(Request $request)
    {
        $words = Word::where('word', 'LIKE', "%$request->word")
                    ->orWhere('read', 'LIKE', "%$request->word")
                    ->orderBy('created_at', 'desc');
        return [
            'words' => $words,
        ];
    }
}
