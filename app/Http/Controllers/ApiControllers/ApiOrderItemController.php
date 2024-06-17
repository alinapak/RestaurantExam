<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class ApiOrderItemController extends Controller
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

        return OrderItem::with('order', 'dish')->get();
        // return \App\Models\OrderedItem::all();

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
            'order_id' => 'required',
            'dish_id' => 'required',
            'quantity' => 'required',
            'item_price' => 'required'
        ]);
        $orderedItem = new OrderItem();
        $orderedItem->order_id = $request->order_id;
        $orderedItem->dish_id = $request->dish_id;
        $orderedItem->quantity = $request->quantity;
        $orderedItem->item_price = $request->item_price;
        return ($orderedItem->save() !== 1) ?
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
        return OrderItem::with('order', 'dish')->find($id);
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
        $orderedItem = OrderItem::find($id);
        $orderedItem->order_id = $request->order_id;
        $orderedItem->dish_id = $request->dish_id;
        $orderedItem->quantity = $request->quantity;
        $orderedItem->item_price = $request->item_price;
        return (OrderItem::findOrFail($id) == true)
            ? (response()->json(['success' => 'success'], 200)
                ?
                $orderedItem->save()
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
        return (OrderItem::destroy($id) == 1) ?
            response()->json(['success' => 'success'], 200) :
            response()->json(['error' => 'deleting from database was not successful'], 500);
    }
    // public function showItemsByOrder($id)
    // {

    //     $orderItem = OrderItem::where('order_id', $id)->get();

    //     return $orderItem;
    // }
}
