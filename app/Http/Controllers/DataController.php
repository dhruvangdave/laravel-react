<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDataRequest;
use App\Http\Requests\UpdateDataRequest;
use App\Models\Data;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $search = $request->input('search');
         if($search !== ""){
            $results = DB::table('data')
                ->where('strGlass', 'like', '%'.$search.'%')
                ->orWhere('strDrink', 'like', '%'.$search.'%')
                ->orWhere('strInstructions', 'like', '%'.$search.'%')
                ->get();

            return response()->json(['results' => $results]);
         }
         else{
            return response()->json(['data'=>Data::get()]);
         }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Data;
        $data->title = $request->title;
        $data->subTitle = $request->subTitle;
        $data->description = $request->description;
        $data->save();
        return response()->json([ 'message'=> "Post created", 'status' => 200, 'data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        return response()->json(['data'=> $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDataRequest  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        $data->title = $request->title;
        $data->subTitle = $request->subTitle;
        $data->description = $request->description;
        $data->save();
        return response()->json([ 'message'=> "Post updated", 'status' => 200, 'data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        $data->delete();
        return response()->json([ 'message' => "Post deleted", 'status' => 200, 'data' => $data]);
    }
}
