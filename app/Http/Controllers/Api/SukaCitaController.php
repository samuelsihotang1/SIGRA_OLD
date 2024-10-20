<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SukaCitaModel;
use Illuminate\Support\Facades\Auth;

class SukaCitaController extends Controller
{

    public function index()
    {
        $gereja = Auth::user()->gereja;
        $suka_cita = SukaCitaModel::where('gereja_id', $gereja->id)->get();

        return response()->json($suka_cita);
    }

    public function show($id)
    {
        $gereja = Auth::user()->gereja;
        $suka_cita = SukaCitaModel::where('gereja_id', $gereja->id)->where('id', $id)->first();
        if ($suka_cita) {
            return response()->json($suka_cita);
        }
        return response()->json(['message' => 'suka_cita not found'], 404);
    }
}
