<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ApiOrderController extends Controller
{
    // public function __construct()
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
        return Order::with('orderItem', 'user')->get();
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
        $request->validate([
            'user_id' => 'required',
            'total_price' => 'required'
        ]);
        $order = new Order();
        $order->user_id = $request->user_id;
        $order->total_price = $request->total_price;
        return ($order->save() !== 1) ?
            response()->json(['success' => 'success'], 201) :
            response()->json(['error' => 'saving to database was not successful'], 500);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Order::with('orderItem', 'user')->find($id);
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
        $order = Order::find($id);
        $order->user_id = $request->user_id;
        $order->total_price = $request->total_price;
        return (Order::findOrFail($id) == true)
            ? (response()->json(['success' => 'success'], 200)
                ? $order->save()
                : "")
            : (response()->json(['error' => 'updating database was not successful'], 500));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return (Order::destroy($id) == 1) ?
            response()->json(['success' => 'success'], 200) :
            response()->json(['error' => 'deleting from database was not successful'], 500);
    }
    // public function userOrders($id)
    // {
    //     return Order::where('user_id', $id)->get();
    // }
}
