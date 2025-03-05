<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        // coba akses model UserModel
        // $user = UserModel::all(); // ambil semua data dari tabel m_user
        // return view('user', ['data' => $user]);

        // tambah data user dengan Eloquent Model
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4
        // ];
        // UserModel::insert($data); // tambahkan data ke tabel m_user

        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username', 'customer-1')->update($data);

        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);

        // Ambil model dengan kunci utamanya...
        // $user = UserModel::find(1);

        // Ambil model pertama yang cocok dengan batasan kueri...
        // $user = UserModel::where('level_id', 1)->first();
        // $user = UserModel::where('username', 'manager')->firstOrFail();

        // Alternatif untuk mengambil model pertama yang cocok dengan batasan kueri...
        // $user = UserModel::firstWhere('level_id', 1);

        // Mencari primary_key 1, menampilkan kolom username & nama, abort jika tidak ada
        // $user = UserModel::findOr(20, ['username', 'nama'], function() {
        //     abort(404);
        // });

        // $user = UserModel::findOrFail(1);

        // Menghitung jumlah dengan kolom level_id bernilai 2
        // $user = UserModel::where('level_id', 2)->count();
        // dd($user);

        // Mencari data teratas, jika tidak ada akan langsung melakukan insert ke database
        // $user = UserModel::firstOrCreate([
        //     'username' => 'manager22',
        //     'nama' => 'Manager Dua Dua',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2,
        // ]);

        // $user = UserModel::firstOrNew([
        //     'username' => 'manager33',
        //     'nama' => 'Manager Tiga Tiga',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2,
        // ]);
        // $user->save();

        $user = UserModel::create([
            'username' => 'manager11',
            'nama' => 'Manager11',
            'password' => Hash::make('12345'),
            'level_id' => 2,
        ]);

        $user->username = 'manager12';

        // $user->isDirty(); // true
        // $user->isDirty('username'); // true
        // $user->isDirty('nama'); // false
        // $user->isDirty(['nama', 'username']); // true

        // $user->isClean(); // false
        // $user->isClean('username'); // false
        // $user->isClean('nama'); // true
        // $user->isClean(['nama', 'username']); // false

        $user->save();

        // $user->isDirty(); // false
        // $user->isClean(); // true
        // dd($user->isDirty()); // false

        $user->wasChanged(); // true
        $user->wasChanged('username'); // true
        $user->wasChanged(['username', 'level_id']); // true
        $user->wasChanged('nama'); // false
        dd($user->wasChanged(['nama', 'username'])); // true

        // coba akses model userModel
        // $user = UserModel::all();
        // return view('user', ['d' => $user]);
    }
}
