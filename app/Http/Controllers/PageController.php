<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return 'Selamat Datang';
    }
    public function about() {
        return 'Nama: Tionusa Catur Pamungkas, NIM: 2341720093';
    }
    public function articles($id) {
        return 'Halaman Artikel dengan Id '.$id;
    }
}
