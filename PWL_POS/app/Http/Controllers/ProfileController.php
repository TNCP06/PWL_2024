<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan halaman profil
    public function index()
    {
        $user = auth()->user();
        $activeMenu = 'profile';
        $breadcrumb = (object)[
            'title' => 'Profile',
            'list' => ['Home', 'Profile']
        ];

        return view('Profile.index', compact('user', 'activeMenu', 'breadcrumb'));
    }

    public function update_photo(Request $request)
    {
        $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = UserModel::find(FacadesAuth::id());

        if ($request->hasFile('profile_photo')) {
            // Jika ada foto profil lama, hapus file yang ada di storage
            if ($user->profile_photo && Storage::exists('public/profile-photos/' . $user->profile_photo)) {
                Storage::delete('public/profile-photos/' . $user->profile_photo);
            }

            // Ambil file yang diupload
            $file = $request->file('profile_photo');

            // Membuat nama file baru dengan menambahkan timestamp
            $filename = time() . '_' . $file->getClientOriginalName();

            // Menyimpan file ke dalam storage di folder 'public/profile-photos'
            $file->storeAs('public/profile-photos', $filename);

            // Log untuk memeriksa apakah filename sudah benar
            Log::info('Updated profile photo filename: ' . $filename);

            // Update kolom profile_photo dengan nama file baru
            $user->profile_photo = $filename;
        }

        // Simpan perubahan data pengguna ke database
        $user->save();

        // Kembalikan response dengan pesan sukses
        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    }
}
