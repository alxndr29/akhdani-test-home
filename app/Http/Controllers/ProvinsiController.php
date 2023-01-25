<?php

namespace App\Http\Controllers;

use App\Kota;
use Illuminate\Http\Request;
use App\Provinsi;
use App\Pulau;

class ProvinsiController extends Controller
{
    public function index()
    {
        $pulau = Pulau::all();
        $provinsi = Provinsi::all();
        return view('admin.provinsi', compact('provinsi', 'pulau'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);
        try {
            $provinsi = new Provinsi();
            $provinsi->nama = $request->get('nama');
            $provinsi->id_pulau = $request->get('pulau');
            $provinsi->save();
            return redirect()->back()->with('sukses', 'Berhasil Tambah Data Baru');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
    public function edit($id)
    {
        // return $id;
        $data = Provinsi::where('id', $id)->first();
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
            $provinsi = Provinsi::find($id);
            $provinsi->nama = $request->get('nama');
            $provinsi->id_pulau = $request->get('pulau');
            $provinsi->save();
            return redirect()->back()->with('sukses', 'Berhasil Ubah Data');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
    public function delete($id)
    {
        try {
            $provinsi = Provinsi::find($id);
            $provinsi->delete();
            return redirect()->back()->with('sukses', 'Berhasil Hapus Data');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
    public function getProvinsi($id){
        $data = Provinsi::where('id_pulau',$id)->get();
        return response()->json([
            'data' => $data
        ]);
    }
}
