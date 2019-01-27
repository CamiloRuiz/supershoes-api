<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\NewStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Store;
use App\Http\Resources\Store as StoreResource;
use App\Http\Resources\Stores as StoresResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    /**
     * Return a listing of the resource.
     *
     * @return StoresResource
     */
    public function index ()
    {
        return new StoresResource(Store::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NewStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewStoreRequest $request)
    {
        $store = Store::create($request->all());
        return response()->json($this->mapStoreResponse($store), 201);
    }

    /**
     * Return the specified resource.
     *
     * @param  Store $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return response()->json($this->mapStoreResponse($store), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateStoreRequest  $request
     * @param  Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        $store->update($request->all());
        return response()->json($this->mapStoreResponse($store), 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->delete();
        return response()->json(null, 204);
    }


    /**
     * Map store object response
     * @param Store $store
     * @return array
     */
    public function mapStoreResponse(Store $store){
        return [
            'success' => true,
            'store' => new StoreResource($store)
        ];
    }
}
