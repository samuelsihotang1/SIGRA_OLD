<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\DukaCitaModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DukaCitaController extends Controller
{
    public function index()
    {
        $gereja = Auth::user()->gereja;
        $duka_cita = DukaCitaModel::where('gereja_id', $gereja->id)->latest()->get();

        return response()->json($duka_cita);
    }
}
