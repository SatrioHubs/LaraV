<?php

namespace App\Http\Controllers; // Namespace untuk controller ini

use App\Models\Item; // Mengimpor model Item untuk interaksi database
use Illuminate\Http\Request; // Mengimpor kelas Request untuk menangani input

class ItemController extends Controller
{
    /**
     * Menampilkan daftar item.
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $items = Item::all(); // Mengambil semua item dari database
        return view('items.index', compact('items')); // Menampilkan view 'items.index' dengan data items
    }

    /**
     * Menampilkan formulir untuk membuat item baru.
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('items.create'); // Menampilkan view 'items.create'
    }

    /**
     * Menyimpan item baru ke database.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([ // Validasi input
            'name' => 'required',
            'description' => 'required'
        ]);

        // Opsi 1: Menyimpan semua input (kurang aman)
        // Item::create($request->all());

        // Opsi 2: Hanya menyimpan atribut yang diizinkan (lebih aman)
        Item::create($request->only(['name', 'description']));

        return redirect()->route('items.index')->with('success', 'Item added successfully.'); // Redirect dengan pesan sukses
    }

    /**
     * Menampilkan detail item tertentu.
     * 
     * @param  \App\Models\Item  $item
     * @return \Illuminate\View\View
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item')); // Menampilkan view 'items.show' dengan data item
    }

    /**
     * Menampilkan formulir untuk mengedit item yang ada.
     * 
     * @param  \App\Models\Item  $item
     * @return \Illuminate\View\View
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item')); // Menampilkan view 'items.edit' dengan data item
    }

    /**
     * Memperbarui item yang ada di database.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([ // Validasi input
            'name' => 'required',
            'description' => 'required',
        ]);

        // Opsi 1: Memperbarui semua input (kurang aman)
        // $item->update($request->all());

        // Opsi 2: Hanya memperbarui atribut yang diizinkan (lebih aman)
        $item->update($request->only(['name', 'description']));

        return redirect()->route('items.index')->with('success', 'Item updated successfully.'); // Redirect dengan pesan sukses
    }

    /**
     * Menghapus item dari database.
     * 
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Item $item)
    {
        $item->delete(); // Menghapus item

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.'); // Redirect dengan pesan sukses
    }
}