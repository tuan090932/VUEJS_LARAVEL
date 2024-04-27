<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class ArticleController extends Controller

{
    public function index()
    {

        $articles = Redis::get('articles');
        if ($articles !== null) {
            return response()->json($articles);
        } else {
            $articles = Article::all();
            Redis::set('articles', $articles);
            return "chua cô du lieu trong redis";
        }
    }
    // Laravel cung cấp các phương thức như create, update, delete
    // để giúp việc quản lý dữ liệu trở nên dễ dàng hơn trong ứng dụng của bạn.
    public function show($id)
    {
        return Article::find($id);
    }

    public function store(Request $request)
    {
        $article = Article::create($request->all());
        return response()->json($article, 201);
    }


    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return 204;
    }
}
