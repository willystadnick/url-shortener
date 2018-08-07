<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UrlCreateRequest;
use App\Http\Requests\UrlUpdateRequest;
use App\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urls = Url::all();

        return response()->json($urls);
    }

    /**
     * Store a resource in storage.
     *
     * @param  UrlCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UrlCreateRequest $request)
    {
        $url = Url::firstOrCreate($request->only('url'));

        return response()->json($url, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Url  $url
     * @return \Illuminate\Http\Response
     */
    public function show(Url $url)
    {
        return response()->json($url);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UrlUpdateRequest  $request
     * @param  Url  $url
     * @return \Illuminate\Http\Response
     */
    public function update(UrlUpdateRequest $request, Url $url)
    {
        if ($request->input('pass') != $url->pass) {
            return response()->json('Not authorized.', 401);
        }

        $url->update($request->all());

        return response()->json($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Url  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Url $url)
    {
        if ($request->input('pass') != $url->pass) {
            return response()->json('Not authorized.', 401);
        }

        $url->delete();

        return response()->json(null, 204);
    }

    /**
     * Redirect to resource url.
     *
     * @param  Url  $url
     * @return \Illuminate\Http\Response
     */
    public function redirect(Url $url)
    {
        return redirect($url->url, 301);
    }
}
