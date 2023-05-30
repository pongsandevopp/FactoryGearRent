<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('layouts.Item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $items = new Item;
        $items->name = $request->name;
        $items->quantity = $request->quantity;
        $items->price = $request->price;
        $items->save();

        return redirect()->route('Item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $items= Item::find($id);
        return view('layouts.item.edit', compact('items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $items = Item::find($id);
        $items->name = $request->name;
        $items->quantity = $request->quantity;
        $items->price = $request->price;
        $items->save();

        return redirect()->route('Item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $items = Item::find($id);
        $items->delete();

        return redirect()->route('Item.index');
    }
}
