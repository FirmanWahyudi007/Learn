<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
      return view('backend.dashboard');
    }

    public function dataDonatur()
    {
      return view('backend.data_donatur');
    }

    public function dataDonasi()
    {
      return view('backend.data_donasi');
    }

    public function tambahDonasi()
    {
      return view('backend.tambah_donasi');
    }

    public function dataYayasan()
    {
      return view('backend.data_yayasan');
    }

    public function tambahYayasan()
    {
      return view('backend.tambah_yayasan');
    }

    public function tambahVideo()
    {
      return view('backend.tambah_video');
    }

    public function listVideo()
    {
      
    }
}
