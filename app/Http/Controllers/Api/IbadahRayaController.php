<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IbadahRayaModel;
use Illuminate\Support\Facades\Auth;

class IbadahRayaController extends Controller
{
    public function index()
    {
        $gereja = Auth::user()->gereja;
        $raya = IbadahRayaModel::where('gereja_id', $gereja->id)->get();

        return response()->json($raya);
    }

    public function show($id)
    {
        $gereja = Auth::user()->gereja;
        $raya = IbadahRayaModel::where('gereja_id', $gereja->id)->where('id', $id)->first();
        if ($raya) {
            return response()->json($raya);
        }
        return response()->json(['message' => 'raya not found'], 404);
    }
}
