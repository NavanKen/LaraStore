<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Suplier::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('telp', 'like', '%' . $search . '%');
            });
        }

        $supliers = $query->latest()->paginate(10)->withQueryString();
        return view('supliers.index', compact('supliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'telp' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        Suplier::create($validated);

        return redirect()->route('supliers.index')
            ->with('success', 'Supplier berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Suplier $suplier)
    {
        return view('supliers.show', compact('suplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suplier $suplier)
    {
        return view('supliers.edit', compact('suplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suplier $suplier)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'telp' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $suplier->update($validated);

        return redirect()->route('supliers.index')
            ->with('success', 'Supplier berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suplier $suplier)
    {
        $suplier->delete();

        return redirect()->route('supliers.index')
            ->with('success', 'Supplier berhasil dihapus.');
    }
}
