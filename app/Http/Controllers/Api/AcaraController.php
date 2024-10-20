<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\UpcomingModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AcaraController extends Controller
{
    public function index()
    {
        $gereja = Auth::user()->gereja;
        $upcoming = UpcomingModel::where('gereja_id', $gereja->id)->get();
        return response()->json($upcoming);
    }

    public function show($id)
    {
        $gereja = Auth::user()->gereja;
        $upcoming = UpcomingModel::where('gereja_id', $gereja->id)->where('id', $id)->first();
        if ($upcoming) {
            return response()->json($upcoming);
        }
        return response()->json(['message' => 'Upcoming not found'], 404);
    }
}
