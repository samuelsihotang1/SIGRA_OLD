<?php

namespace App\Http\Controllers\Api;

use App\Models\BPHModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BphController extends Controller
{
    public function index()
    {
        $gereja = Auth::user()->gereja;
        $bph = BPHModel::where('gereja_id', $gereja->id)->get();
        return response()->json($bph);
    }

    public function show($id)
    {
        $gereja = Auth::user()->gereja;
        $bph = BPHModel::where('gereja_id', $gereja->id)->where('id', $id)->first();
        if ($bph) {
            return response()->json($bph);
        }
        return response()->json(['message' => 'bph not found'], 404);
    }
}
