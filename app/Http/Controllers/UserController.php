<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }
    public function create()
    { }
    public function store(Request $request)
    {
        try {
            User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'role' => $request->get('role')
            ]);
            return redirect()->back()->with('sukses', 'Berhasil Tambah Data Baru');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        return $user = User::find($id);
    }
    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            if ($request->get('password')) {
                $user->password = bcrypt($request->get('password'));
            }
            $user->role = $request->get('role');
            $user->save();
            return redirect()->back()->with('sukses', 'Berhasil Ubah Data');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try{
            $user = User::find($id);
            $user->delete();
            return redirect()->back()->with('sukses', 'Berhasil Hapus Data');
        }catch(\Exception $e){
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
}
