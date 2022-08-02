<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class ApiDishController extends Controller
{
       public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dish = Dish::all();
        $dish = Dish::with('menu')->get();
        return $dish;
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
        $dish = new Dish();
        $dish->title = $request->input('title');
        $dish->price = $request->input('price');
        if ($request->file('file') == null) {
            $dish->file = "";
        }else if ($request->file('file') !== null) {
            $dish->file = $request->file('file')->store('images');  
        }  
        $dish->description = $request->input('description');
        $dish->menu_id = $request->input('menu_id');
        return $dish->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $dish= Dish::find($id);
        $dish->title = $request->input('title');
        $dish->price = $request->input('price');
        if ($request->file('file') == null) {
            $dish->file = "";
        }else if ($request->file('file') !== null) {
            $dish->file = $request->file('file')->store('images');  
        }  
        $dish->description = $request->input('description');
        $dish->menu_id = $request->input('menu_id');
        return $dish->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return (Dish::destroy($id) == 1) ? 
        response()->json(['success' => 'success'], 200) : 
        response()->json(['error' => 'delete not successful'], 500);
    }
}
