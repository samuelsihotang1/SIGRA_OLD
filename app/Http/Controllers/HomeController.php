<?php

namespace App\Http\Controllers;

use App\Models\HomeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman formulir.
     *
     * @return \Illuminate\View\View
     */
    public function view_home(Request $request)
    {

        try {
            $gereja = $request->gereja;
            $data_home = HomeModel::where('gereja_id', $gereja->id)->first();
            $nama_gereja = $gereja->nama_gereja;
            return view('view.home.home', compact('data_home', 'nama_gereja'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('error.page')->with('error', 'Home data not found');
        }
    }

    public function index(Request $request)
    {
        $nama_gereja = $request->gereja->nama_gereja;
        return view('admin.home.tambah_home', compact('nama_gereja'));
    }

    /**
     * Menyimpan data yang diinput ke dalam tabel "church_info".
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'jam_mulai_pagi' => 'required',
            'jam_selesai_pagi' => 'required',
            'jam_mulai_siang' => 'required',
            'jam_selesai_siang' => 'required',
            'youtube' => 'nullable',
            'link' => 'required|url|regex:/^https:\/\/.*/',
            'kartu_keluarga' => 'required|string',
            'total_jemaat' => 'required|integer',
            'total_bph' => 'required|integer',
            'total_pendeta' => 'required|integer',
            'no_telp' => 'required|numeric',
            'email' => 'nullable|email|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
        ], [
            'link.regex' => 'Format yang dimasukkan salah',
            'link.url' => 'Link harus berupa URL yang valid, seperti memiliki "https://"',
            'email.regex' => 'Format yang dimasukkan salah',
            'no_telp.numeric' => 'Nomor telepon harus dalam format angka',
        ]);

        // Memeriksa apakah jam ibadah pagi sama dengan jam ibadah siang
        if (
            $request->jam_mulai_pagi === $request->jam_mulai_siang &&
            $request->jam_selesai_pagi === $request->jam_selesai_siang
        ) {
            return redirect()->back()->withErrors(['error' => 'Jam ibadah pagi dan siang tidak boleh sama.']);
        }

        // Memeriksa aturan jam_mulai_siang tidak boleh sama dengan jam_selesai_pagi
        if ($request->jam_mulai_siang === $request->jam_selesai_pagi) {
            return redirect()->back()->withErrors(['error' => 'Jam mulai siang tidak boleh sama dengan jam selesai pagi.']);
        }

        // Memeriksa aturan jam_mulai_siang tidak boleh lebih awal dari jam_selesai_pagi
        if ($request->jam_mulai_siang < $request->jam_selesai_pagi) {
            return redirect()->back()->withErrors(['error' => 'Jam mulai siang tidak boleh lebih awal dari jam selesai pagi.']);
        }

        $gerejaId = Auth::user()->gereja->id;

        HomeModel::updateOrCreate(
            ['gereja_id' => $gerejaId],
            $request->all()
        );

        return redirect()->back()->with('success', 'Informasi berhasil disimpan.');
    }



}
