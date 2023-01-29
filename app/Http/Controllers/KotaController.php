<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kota;
use App\Provinsi;
use App\Pulau;

class KotaController extends Controller
{
    //
    public function index()
    {
        $kota = Kota::all();
        $pulau = Pulau::all();
        $provinsi = Provinsi::all();
        return view('admin.kota', compact('pulau', 'kota', 'provinsi'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);
        try {
            $kota = new Kota();
            $kota->nama = $request->get('nama');
            $kota->id_provinsi = $request->get('provinsi');
            if ($request->has('luar-negeri')) {
                $kota->luar_negeri = 1;
            } else {
                $kota->luar_negeri = 0;
            }
            $kota->latitude = $request->get('latitude');
            $kota->longitude = $request->get('longitude');
            $kota->save();
            return redirect()->back()->with('sukses', 'Berhasil Tambah Data Baru');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
    public function edit($id)
    {
        $data = Kota::where('id', $id)->with(['Provinsi'])->first();
        return response()->json([
            'data' => $data
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);
        try {
            $kota = Kota::find($id);
            $kota->nama = $request->get('nama');
            $kota->id_provinsi = $request->get('provinsi');
            $kota->latitude = $request->get('latitude');
            $kota->longitude = $request->get('longitude');
            if ($request->has('luar-negeri')) {
                $kota->luar_negeri = 1;
            } else {
                $kota->luar_negeri = 0;
            }
            $kota->save();
            return redirect()->back()->with('sukses', 'Berhasil Ubah Data');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
    public function delete($id)
    {
        try {
            $kota = Kota::find($id);
            $kota->delete();
            return redirect()->back()->with('sukses', 'Berhasil Hapus Data');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
}
