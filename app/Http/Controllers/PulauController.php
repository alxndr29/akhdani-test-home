<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pulau;

class PulauController extends Controller
{
    //
    public function index()
    {
        $pulau = Pulau::all();
        return view('admin.pulau', compact('pulau'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);
        try {
            $pulau = new Pulau();
            $pulau->nama = $request->get('nama');
            $pulau->save();
            return redirect()->back()->with('sukses', 'Berhasil Tambah Data Baru');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
    public function edit($id)
    {
        $data = Pulau::where('id', $id)->first();
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
            $pulau = Pulau::find($id);
            $pulau->nama = $request->get('nama');
            $pulau->save();
            return redirect()->back()->with('sukses', 'Berhasil Ubah Data');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
    public function delete($id)
    {
        try {
            $pulau = Pulau::find($id);
            $pulau->delete();
            return redirect()->back()->with('sukses', 'Berhasil Hapus Data');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
}
