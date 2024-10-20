<?php

namespace App\Http\Controllers\Api;

use App\Models\BulananModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BulananController extends Controller
{
    public function index()
    {
        $gereja = Auth::user()->gereja;
        $bulanan = BulananModel::where('gereja_id', $gereja->id)->get();

        return response()->json($bulanan);
    }

    public function show($id)
    {
        $gereja = Auth::user()->gereja;
        $bulanan = BulananModel::where('gereja_id', $gereja->id)->where('id', $id)->first();
        if ($bulanan) {
            return response()->json($bulanan);
        }
        return response()->json(['message' => 'bulanan not found'], 404);
    }
}
