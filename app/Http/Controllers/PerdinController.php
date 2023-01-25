<?php

namespace App\Http\Controllers;

use App\Kota;
use App\Perdin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerdinController extends Controller
{
    //
    public function indexPegawai()
    {
        $kota = Kota::all();
        $perdin = Perdin::where('id_user',Auth::user()->id)->get();
        return view('user.index', compact('kota', 'perdin'));
    }
    public function storePegawai(Request $request)
    {
        $asal = Kota::where('id', $request->get('kota_asal'))->first();
        $tujuan = Kota::where('id', $request->get('kota_tujuan'))->first();
        $jarak = $this->haversineGreatCircleDistance($asal->latitude, $asal->longitude, $tujuan->latitude, $tujuan->longitude);
        // return $jarak;
        $uang = 0;
        if ($jarak < 60) {
            $uang = 0;
        } else if ($jarak >= 60 && $asal->id_provinsi == $tujuan->id_provinsi) {
            $uang = 200000 * $request->get('total_hari');
        } else if ($jarak >= 60 && $asal->id_provinsi != $tujuan->id_provinsi && $asal->provinsi->pulau->id == $tujuan->provinsi->pulau->id && $asal->luar_negeri != 1 && $tujuan->luar_negeri != 1) {
            $uang = 250000 * $request->get('total_hari');
        } else if ($asal->luar_negeri == 1 || $tujuan->luar_negeri == 1) {
            $usd = 14000 * 50;
            $uang = $usd * $request->get('total_hari');
        }

        try {
            $perdin = new Perdin();
            $perdin->kota_asal = $request->get('kota_asal');
            $perdin->kota_tujuan = $request->get('kota_tujuan');
            $perdin->tanggal_awal = $request->get('tanggal_awal');
            $perdin->tanggal_akhir = $request->get('tanggal_akhir');
            $perdin->total_hari = $request->get('total_hari');
            $perdin->keterangan = $request->get('keterangan');
            $perdin->jarak = $jarak;
            $perdin->total_uang = $uang;
            $perdin->status = "pending";
            $perdin->id_user = Auth::user()->id;
            $perdin->save();
            return redirect()->back()->with('sukses', 'Berhasil Tambah Data Baru');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
    function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
    {
        $earthRadius = 6371000;
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);
        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;
        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return round($angle * $earthRadius / 1000);
    }
    public function indexDivisiSdm()
    {
        $pengajuan_baru = Perdin::where('status','pending')->get();
        $history = Perdin::where('status','!=','pending')->get();
        return view('divisi-sdm.index',compact('pengajuan_baru','history'));
    }
    public function setuju($id){
        try{
            $perdin = Perdin::find($id);
            $perdin->status = "setuju";
            $perdin->save();
            return redirect()->back()->with('sukses', 'Berhasil Ubah Status');
        }catch(\Exception $e){
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
    public function tolak($id){
        try {
            $perdin = Perdin::find($id);
            $perdin->status = "tolak";
            $perdin->save();
            return redirect()->back()->with('sukses', 'Berhasil Ubah Status');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
}
