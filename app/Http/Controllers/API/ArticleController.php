<?php

namespace App\Http\Controllers\API;

use App\Article;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Return the specified resource.
     *
     * @param  Article $article
     * @return ArticleResource
     */
    public function show(Article $article)
    {
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
