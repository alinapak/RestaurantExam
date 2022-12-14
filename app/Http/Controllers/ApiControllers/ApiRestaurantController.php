<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiRestaurantController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }
    public function index()
    {
        return Restaurant::with('menu')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAdministrator()) {
            $request->validate([
                'title' => 'required|unique:restaurants',
                'code' => 'unique:restaurants'
            ]);
            $rest = new Restaurant();
            $rest->title = $request->input('title');
            $rest->code = $request->input('code');
            $rest->city = $request->input('city');
            $rest->address = $request->input('address');
            return $rest->save();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Restaurant::with('menu')->find($id);
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
        // $request->validate([
        //     'title' => 'required:restaurants',
        //     'code' => 'unique:restaurants'
        // ]);
        if (Auth::user()->isAdministrator()) {
            $rest = Restaurant::find($id);
            $rest->title = $request->input('title');
            $rest->code = $request->input('code');
            $rest->city = $request->input('city');
            $rest->address = $request->input('address');
            return $rest->save();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->isAdministrator()) {
            return (Restaurant::destroy($id) == 1) ?
                response()->json(['success' => 'success'], 200) :
                response()->json(['error' => 'delete not successful'], 500);
        }
    }
    function searchRestaurant($key=null)
    {
        return Restaurant::where('title', 'Like', "%$key%")->with('menu')->get();
    }
}
