<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::getPaginated($request);
        if($request->has('sort')){
          $articles = Article::getPaginated($request)->sortByDesc('published_at');
        }
        return view("frontend.articles.index", compact('articles'));
    }


    public function show($articleId, $articleHeading = '')
    {
        $article = Article::where('id', $articleId)
            ->published()
            ->notDeleted()
            ->with(['user', 'category', 'keywords',])
            ->first();

        if (is_null($article)) {
            return redirect()->route('home')->with('warning', 'Article not found');
        }

        $article->isEditable = $this->isEditable($article);



        return view("frontend.articles.show", compact('article'));
    }

    private function isEditable(Article $article)
    {
        if (!auth()->check()) {
            return false;
        }
        $isAdmin = auth()->user()->hasRole(['owner', 'admin']);
        $isAuthor = $article->user->id == auth()->user()->id;
        return auth()->check() && ($isAdmin || $isAuthor);
    }




}
