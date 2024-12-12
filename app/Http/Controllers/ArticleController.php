<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        return view("Article.index", ['articles' => Article::latest()->filter(request(['tag', 'search']))->paginate(2)]);
    }
    public function show(Article $article)
    {
        return view("Article.show", ['article' => $article, 'latestArticles' => Article::latest()->filter(request(['tag', 'search']))->take(4)->get()]);
    }

    public function create()
    {
        return view("Article.create");
    }

    public function store(Request $request)
    {
        // dd($request->file('image'));
        $formFields = $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'content' => 'required',
            'tags' => 'required'
        ]);


        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('ArticleImage', 'public');

        }


        Article::create($formFields);

        return redirect('/articles/manage')->with('message', 'Article created successfully!');
    }

    public function edit(Article $article)
    {
        return view('Article.edit', ['article' => $article]);
    }

    public function update(Request $request, Article $article)
    {

        $formFields = $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'content' => 'required',
            'tags' => 'required'
        ]);

        if ($request->hasFile('image')) {
            // Check if there's an old image and delete it
            if ($article->image && Storage::disk('public')->exists($article->image)) {
                Storage::disk('public')->delete($article->image);
            }

            // Store the new image
            $formFields['image'] = $request->file('image')->store('ArticleImage', 'public');
        } else {
            // If no new image is provided, retain the old image path
            $formFields['image'] = $article->image;
        }

        $article->update($formFields);

        return redirect('/articles/manage')->with('message', 'Article Updated Successfully!');
    }

    public function manage()
    {
        return view('Article.manage', ['articles' => Article::latest()->filter(request(['tag', 'search']))->paginate(6)]);
    }

    public function destroy(Article $article)
    {
        if ($article->image && Storage::disk('public')->exists($article->image)) {
            Storage::disk('public')->delete($article->image);
        }
        $article->delete();
        return redirect('/articles/manage')->with('message', 'article deleted successfully');
    }

}
