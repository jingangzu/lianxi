<?php

namespace App\Http\Controllers;

use App\Models\MODEL;
use Illuminate\Http\Request;

class TreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tree = MODEL::find(6);
//        $data = $tree->getDescendantsAndSelf()->toHierarchy();
        $data = $tree->descendantsAndSelf()->withoutSelf()->get();
//        $data = MODEL::isValidNestedSet();
//        $data = MODEL::rebuild();
        $data = MODEL::getNestedList('name');
       return response()->json(['data' =>$data]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->input('father_id')) {
            $father = MODEL::find($request->input('father_id'));
            $data = $father->children()->create(['name'=>$request->input('name')]);
        } else {
            $data = MODEL::create(['name'=>$request->input('name')]);
        }

//
//        $child2->makeChildOf(MODEL::find(1));
        return response()->json(['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
//        $node = MODEL::find($id);
//        $node->mokeRoot();
        $child2 = MODEL::find(3);
        $child2->makeRoot();
//        $child2->makeChildOf(MODEL::find(4));
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
