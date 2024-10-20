<?php

namespace App\Http\Controllers\Api;

use App\Models\SejarahModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SejarahController extends Controller
{
    public function index()
    {
        $gereja = Auth::user()->gereja;

        $sejarah = SejarahModel::where('gereja_id', $gereja->id)->get();

        return response()->json($sejarah);
    }

    public function show($id)
    {
        $gereja = Auth::user()->gereja;
        $sejarah = SejarahModel::where('gereja_id', $gereja->id)->where('id', $id)->first();
        if ($sejarah) {
            return response()->json($sejarah);
        }
        return response()->json(['message' => 'sejarah not found'], 404);
    }
}
