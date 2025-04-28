<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SamarindaController extends Controller
{
    /* public function semuaBerita()
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
    } */

    protected $apiUrl = 'http://api.samarindakota.go.id/api/v2/generate/dinas-komunikasi-dan-informatika/beritakominfo';
    protected $apiToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjkwNDY3MTEwOTJjZGE0YjFhYmIxOTc3M2VhZWM3YmUzM2Q3M2M4MDkzZTAxNjJmOTRmZmNkYTcyZGY2MzdiOTM2ZTg4ZTlkMzkzODdmMzllIn0.eyJhdWQiOiIzIiwianRpIjoiOTA0NjcxMTA5MmNkYTRiMWFiYjE5NzczZWFlYzdiZTMzZDczYzgwOTNlMDE2MmY5NGZmY2RhNzJkZjYzN2I5MzZlODhlOWQzOTM4N2YzOWUiLCJpYXQiOjE3NDU4NDkyMjgsIm5iZiI6MTc0NTg0OTIyOCwiZXhwIjoxNzc3Mzg1MjI4LCJzdWIiOiI4NTEiLCJzY29wZXMiOlsiYmVyaXRha29taW5mbyJdfQ.MOR_9kWbnBuLkbNuV5QSL34vAHGeRkPmPqv8DF0MOYZi3uSuht34r_tya89Pfma6Bx9foKmoA0IvWfDL3jvNTE_LWEcV-M85X-OmqaYXsggfWoPctUkivIwqrnz179jS1WkVqcjuh1wn_RGwKdeoMZ3eyJWUQszW31F6m4TugHzRirNEgZeaT7vqhfcoS9AkJJkYARWBHlu-TUe3oIC5GH1rfUI9YEyOSAPm1drTRHP4TePt2vSbfznKFCYp8h73t2Z7tWeVA8pbdGfq1P1hX7SOJuVIC7BWSd380alMrM6ymVruCbfzhr_eNivxnaFWz48Gm1OOqg3w8SkPHE5aKNnZVScnaAdq_opvOKNR5DCtMD4K6o7fhzvL0UBMI8qrxTQnlITpO1abpQBkwBTDN4NrG3yePUoJ1ycVj-I9ygZhrRURUE7cFWbO81jtV7ROzBbKMWcPHjnDYI7-ygc6kkGyVW1JdEhFBDzHoEEa7ofxgYn_PLy8GGAqYt_pZPW41XVJc78mkcQzaHuCTy6WytE2uvkjnBmpBQWIA7dvMU1j6BE53qq7cYREQDA5jsCnbbCnx-BHKKAlLrR2Naae_j1O2yav7_hyoHij27U8z6AxrTQL14yD2HlXd16RX7wY2RdInkemZpm4NC_UHfCfcTDAU9BSBZTuYAbQHWcSXTU';

    public function semuaBerita()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiToken,
            'Accept' => 'application/json',
        ])->get($this->apiUrl);

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['message' => 'Gagal mengambil data'], 500);
    }

    public function detailBerita($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiToken,
            'Accept' => 'application/json',
        ])->get("{$this->apiUrl}/{$id}");

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }
}
