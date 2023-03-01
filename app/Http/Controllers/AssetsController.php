<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssetsRequest;
use App\Http\Requests\UpdateAssetsRequest;
use App\Models\Assets;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $asset_obj = Assets::all();

        return view('assets_list',[
            'assets' => $asset_obj,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('assets_form',[
            'asset_id' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAssetsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssetsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function show(Assets $assets, int $id)
    {
        //
        $asset_obj = Assets::where('asset_id', '=', 1)->get();

        return view('asset',[
            'asset_id' => $id,
            'asset' => $asset_obj,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function edit(Assets $assets, int $id)
    {
        //
        return view('assets_form',[
            'asset_id' => $id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssetsRequest  $request
     * @param  \App\Models\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssetsRequest $request, Assets $assets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assets $assets)
    {
        //
    }
}