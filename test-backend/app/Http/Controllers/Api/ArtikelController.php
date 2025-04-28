<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Artikel::with('user')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $artikel = Artikel::create($request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|string',
            'user_id' => 'required|exists:users,id'
        ]));

        return response()->json($artikel, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        return $artikel;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel)
    {
        $artikel->update($request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|string',
            'user_id' => 'required|exists:users,id'
        ]));

        return response()->json($artikel);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        $artikel->delete();

        return response()->json(null, 204);
    }
}
