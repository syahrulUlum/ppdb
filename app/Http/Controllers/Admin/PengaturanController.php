<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    public function index()
    {
        $pengaturan = Pengaturan::first();
        return view('admin.pengaturan', compact('pengaturan'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'foto_kepsek' => 'nullable|file|mimes:jpg,jpeg,png',
            'foto_sekolah' => 'nullable|file|mimes:jpg,jpeg,png',
            'buka_pendaftaran' => 'required|date|date_format:Y-m-d\TH:i',
            'tutup_pendaftaran' => 'required|date|date_format:Y-m-d\TH:i|after:buka_pendaftaran',

        ], [
            'tutup_pendaftaran.after' => 'Waktu tutup pendaftaran tidak boleh kurang dari waktu buka pendaftaran'
        ]);

        $pengaturan = Pengaturan::first();


        $requestData = $request->all();

        if ($request->hasFile('foto_kepsek')) {
            $foto = $request->file('foto_kepsek');
            $nama_foto = $this->generateRandomString() . '.' . $foto->getClientOriginalExtension();
            $foto_path = 'halaman/' . $nama_foto;
            $foto->storeAs('public', $foto_path);

            if ($pengaturan->foto_kepsek) {
                $this->deleteImage($pengaturan->foto_kepsek, 'halaman');
            }
            $requestData['foto_kepsek'] = $nama_foto;
        }

        if ($request->hasFile('foto_sekolah')) {
            $foto = $request->file('foto_sekolah');
            $nama_foto = $this->generateRandomString() . '.' . $foto->getClientOriginalExtension();
            $foto_path = 'halaman/' . $nama_foto;
            $foto->storeAs('public', $foto_path);

            if ($pengaturan->foto_sekolah) {
                $this->deleteImage($pengaturan->foto_sekolah, 'halaman');
            }
            $requestData['foto_sekolah'] = $nama_foto;
        }


        $pengaturan->update($requestData);

        return redirect('/pengaturan')->with('berhasil', 'Data berhasil diperbarui');
    }


    private function generateRandomString($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    private function deleteImage($image_name, $path)
    {
        if ($image_name && Storage::disk('public')->exists("$path/$image_name")) {
            Storage::disk('public')->delete("$path/$image_name");
        }
    }
}
