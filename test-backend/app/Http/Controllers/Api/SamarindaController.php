<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SamarindaController extends Controller
{
    public function semuaBerita()
    {
        $response = Http::get('https://api.samarindakota.go.id/berita');
        
        return response()->json($response->json());
    }

    public function detailBerita($id)
    {
        $response = Http::get("https://api.samarindakota.go.id/berita/{$id}");

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }
}
