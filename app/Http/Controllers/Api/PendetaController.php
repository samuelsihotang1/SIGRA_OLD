<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PendetaModel;
use Illuminate\Support\Facades\Auth;

class PendetaController extends Controller
{
    public function index()
    {
        $gereja = Auth::user()->gereja;
        $pendeta = PendetaModel::where('gereja_id', $gereja->id)->get();

        return response()->json($pendeta);
    }

    public function show($id)
    {
        $gereja = Auth::user()->gereja;
        $pendeta = PendetaModel::where('gereja_id', $gereja->id)->where('id', $id)->first();
        if ($pendeta) {
            return response()->json($pendeta);
        }

        return response()->json(['message' => 'Pendeta tidak ditemukan'], 404);
    }
}
