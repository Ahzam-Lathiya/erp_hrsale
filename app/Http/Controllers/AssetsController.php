<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssetsRequest;
use App\Http\Requests\UpdateAssetsRequest;
use App\Models\Assets;

//use Illuminate\Support\Facades\View;


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

        return view('assets.assets_list',[
            'assets' => $asset_obj,
            'page_title' => 'Assets',
            'main_heading' => 'Assets'
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
        return view('assets.assets_form',[
            'asset_id' => null,
            'page_title' => 'Asset',
            'main_heading' => 'Asset',
            'form_action' => '/assets'
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
        dd($request);
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
        $asset_obj = Assets::where('asset_id', '=', $id)->get();

        // echo '<pre>';
        // \print_r($asset_obj);
        // echo '</pre>';
        // exit;

        return view('assets.asset',[
            'asset_id' => $id,
            'asset' => $asset_obj,
            'main_heading' => 'Asset',
            'page_title' => 'Asset'
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
        return view('assets.assets_form',[
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

?>