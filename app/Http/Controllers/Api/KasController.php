<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasController extends Controller
{
    public function index()
    {
        $gereja = Auth::user()->gereja;
        $kas = KasModel::where('gereja_id', $gereja->id)->get();

        return response()->json($kas);
    }

    public function show($id)
    {
        $gereja = Auth::user()->gereja;
        $kas = KasModel::where('gereja_id', $gereja->id)->where('id', $id)->first();
        if ($kas) {
            return response()->json($kas);
        }
        return response()->json(['message' => 'kas not found'], 404);
    }
}
