<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\MingguanModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MingguanController extends Controller
{
    public function index()
    {
        $gereja = Auth::user()->gereja;
        $mingguan = MingguanModel::where('gereja_id', $gereja->id)->get();
        return response()->json($mingguan);
    }

    public function show($id)
    {
        $gereja = Auth::user()->gereja;
        $mingguan = MingguanModel::where('gereja_id', $gereja->id)->where('id', $id)->first();
        if ($mingguan) {
            return response()->json($mingguan);
        }
        return response()->json(['message' => 'mingguan not found'], 404);
    }
}
