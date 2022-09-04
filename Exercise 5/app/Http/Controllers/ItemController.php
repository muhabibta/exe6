<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ItemController extends Controller
{
    // Index
    public function index()
    {
        $items = Item::with('Category')->get();

        return view('items.index', compact('items'));
    }

    // Create
    public function create()
    {
        $kategori = Category::get();
        return view("items.create", compact('kategori'));
    }
    public function store(Request $request)
    {
        $items = Item::create([
            "name" => $request->name,
            "category_id" => $request->kategori,
            "quantity" => $request->quantity,
            "price" => $request->price,
            
        ]);

        return redirect('/');
    }

    // Edit
    public function edit($id)
    {
        $item = Item::findOrFail($id);

        return view('items.edit', compact('item'));
    }
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update([
            "name" => $request->name ?? $item->name,
            "quantity" => $request->quantity ?? $item->quantity,
            "price" => $request->price ?? $item->price,
            "status" => $request->status ?? $item->status,
        ]);

        return redirect('/');
    }

    // Destroy
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect('/');
    }
}
