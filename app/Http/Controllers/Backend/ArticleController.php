<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    public function index()
    {
        return view('backend.articles.index');
    }

    public function create(Article $article)
    {
        return view('backend.articles.create', compact('article'));
    }

    public function edit(Article $article)
    {
        if ($article->hasAuthorization(Auth::user())) {
            return redirect()->route('home')->with('errorMsg', 'Unauthorized request');
        }

        return view('backend.articles.edit', compact('article'));
    }

    public function autoimport()
    {

        $apiURL = 'https://sq1-api-test.herokuapp.com/posts';

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $apiURL);

        $statusCode = $response->getStatusCode();
        $responseBody = json_decode($response->getBody(), true);


        $articles = $responseBody['data'];
        
        foreach ($articles as $key => $article) {
          // code...
          $newArticle = [];
          $newArticle['user_id'] = Auth::id();
          $newArticle['heading'] = $article['title'];
          $newArticle['content'] = $article['description'];
          $newArticle['published_at'] = $article['publication_date'];
          $newArticle = Article::create($newArticle);

        }

        session()->flash('success', 'Article published successfully!');
        return view('backend.articles.index');

    }



}
