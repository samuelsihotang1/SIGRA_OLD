<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\AyatHarianModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AyatController extends Controller
{
    public function index()
    {
        $gereja = Auth::user()->gereja;

        $ayat = AyatHarianModel::where('gereja_id', $gereja->id)->get();

        return response()->json($ayat);
    }

    public function show($id)
    {
        $gereja = Auth::user()->gereja;
        $ayat = AyatHarianModel::where('gereja_id', $gereja->id)->where('id', $id)->first();
        return response()->json($ayat);
    }
}
