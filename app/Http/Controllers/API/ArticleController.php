<?php

namespace App\Http\Controllers\API;

use App\Article;
use App\Http\Requests\NewArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Store;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Resources\Articles as ArticlesResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Return a listing of the resource.
     *
     * @return ArticlesResource
     */
    public function index()
    {
        return new ArticlesResource(Article::all());
    }

    /**
     * Return articles by store.
     *
     * @param  Store $store
     * @return ArticlesResource
     */
    public function getArticlesByStore(Store $store)
    {
        return new ArticlesResource($store->articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NewArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewArticleRequest $request)
    {
        $article = Article::create($request->all());
        return response()->json($this->mapArticleResponse($article), 201);
    }

    /**
     * Return the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return response()->json($this->mapArticleResponse($article), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateArticleRequest  $request
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->update($request->all());
        return response()->json($this->mapArticleResponse($article), 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json(null, 204);
    }

    /**
     * Map article object response
     * @param Article $article
     * @return array
     */
    public function mapArticleResponse(Article $article){
        return [
            'success' => true,
            'article' => new ArticleResource($article)
        ];
    }
}
