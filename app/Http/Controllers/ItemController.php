<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Facades\Hash;

class ItemController extends Controller
{
    public function index()
    {
        return view('items.index', [
            'title' => 'Data Barang',
            'items' => Item::all(),
        ]);
    }

    public function create()
    {
        return view('items.create', [
            'title' => 'Tambah Barang',
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        $item = Item::create([
            'name' => request('name'),
            'price' => request('price'),
            'quantity' => request('quantity'),
            'description' => request('description'),
        ]);

        return redirect()->route('items.index')->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function edit(Item $item)
    {
        return view('items.edit', [
            'title' => 'Edit Barang',
            'item' => $item,
        ]);
    }

    public function update(Item $item)
    {
        request()->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        $item->update([
            'name' => request('name'),
            'price' => request('price'),
            'quantity' => request('quantity'),
            'description' => request('description'),
        ]);
        return redirect()->route('items.index')->with('success', 'Data user was deleted!');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return back()->with('success', 'Barang berhasil dihapus');
    }
}
