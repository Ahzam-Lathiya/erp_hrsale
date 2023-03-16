<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssetsRequest;
use App\Http\Requests\UpdateAssetsRequest;
use App\Models\Assets;
use Carbon\Carbon;

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

        $add_asset_link = '/resources/create';

        return view('assets.assets_list',[
            'assets' => $asset_obj,
            'page_title' => 'Assets',
            'main_heading' => 'Assets',
            'add_asset_link' => $add_asset_link
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
        try
        {
            $asset_obj = new Assets();

            $asset_obj->asset_type_id = $request->input('asset_type_id');
            $asset_obj->name = $request->input('name');
            $asset_obj->status = $request->input('status');
            $asset_obj->created_at = Carbon::now();
    
            $result = $asset_obj->save();
    
            if( $result != true )
            {
                return response()
                ->json([
                    'status' => 'false',
                    'message' => 'Could not create asset'
                ],
                500);
            }
    
            return response()
            ->json([
                'status' => 'true',
                'message' => 'Asset Created Successfully',
                'redirect_url' => "http://127.0.0.1/resources/$asset_obj->id",
                'asset_id' => $asset_obj->id
            ],
            201);
        }

        catch(\Exception $e)
        {
            return response()
            ->json([
                'status' => 'false',
                'message' => $e->getMessage(),
            ],
            500);
        }

        catch(\Error $e)
        {
            return response()
            ->json([
                'status' => 'false',
                'message' => $e->getMessage(),
            ],
            500);
        }
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