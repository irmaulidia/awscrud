<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        $data = [
            'karyawan' => $karyawan,
        ];
        return view('index', $data);
    }
    public function create(Request $req)
    {
        $karyawan = Karyawan::create([
            'nama' => $req->nama,
            'tanggal_lahir' => $req->tanggal_lahir,
            'gaji' => $req->gaji,
            'status_karyawan' => $req->status_karyawan,
        ]);

        return redirect()->route('karyawan.index')->with('status', 'Tambah Data Berhasil');
    }
    public function update(Request $req)
    {
        $karyawan = Karyawan::where('id', $req->id)->update([
            'nama' => $req->nama,
            'tanggal_lahir' => $req->tanggal_lahir,
            'gaji' => $req->gaji,
            'status_karyawan' => $req->status_karyawan,
        ]);

        return redirect()->route('karyawan.index')->with('status', 'Edit Data Berhasil');

    }
    public function delete($id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('status', 'Hapus Data Berhasil');

    }
    public function getKaryawan($id)
    {
        $karyawan = Karyawan::find($id);

        return json_encode($karyawan);

    }
}