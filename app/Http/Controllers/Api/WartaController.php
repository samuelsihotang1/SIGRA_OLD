<?php

namespace App\Http\Controllers\Api;

use App\Models\WartaModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WartaController extends Controller
{
    public function index()
    {
        $gereja = Auth::user()->gereja;
        $wartas = WartaModel::where('gereja_id', $gereja->id)->latest()->get();
        return response()->json($wartas);
    }

    public function show($id)
    {
        $gereja = Auth::user()->gereja;
        $warta = WartaModel::where('gereja_id', $gereja->id)->where('id', $id)->first();
        if ($warta) {
            return response()->json($warta);
        }
        return response()->json(['message' => 'warta not found'], 404);
    }
}
