<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use File;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'artikel' => Artikel::orderBy('id', 'asc')->get(),
        ];
        return view('backend.data_artikel', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tambah_artikel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url_artikel = $request->url_artikel;
        $sampul = $request->sampul;
        $judul_artikel = $request->judul_artikel;
        $isi_artikel = $request->isi_artikel;
        $tanggal = $request->tanggal;
        $sampulName = $sampul->getClientOriginalName();
        $sampul->move(public_path('images'),$sampulName);

        $artikel = new Artikel();
        $artikel -> url_artikel = $url_artikel;
        $artikel -> sampul = $sampulName;
        $artikel -> judul_artikel = $judul_artikel;
        $artikel -> isi_artikel = $isi_artikel;
        $artikel -> tanggal = $tanggal;
        $artikel -> save();
        return redirect()->route('artikel.index')->with('success', 'Data Artikel Berhasil di Simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::findorfail($id);
        return view('backend.edit_artikel', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $url_artikel = $request->url_artikel;
        $judul_artikel = $request->judul_artikel;
        $isi_artikel = $request->isi_artikel;
        $tanggal = $request->tanggal;
        $artikel = Artikel::find($request->id);
        $artikel -> url_artikel = $url_artikel;
        $artikel -> judul_artikel = $judul_artikel;
        $artikel -> isi_artikel = $isi_artikel;
        $artikel -> tanggal = $tanggal;
        if (isset($request->sampul)) {
            $sampul = $request->sampul;
            $sampulName = $sampul->getClientOriginalName();
            $sampul->move(public_path('images'),$sampulName);
            $artikel -> sampul = $sampulName;
        }
        $artikel -> save();
        return redirect()->route('artikel.index')->with('success', 'Data Artikel Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambar = Artikel::find($id);
        File::delete('images/'.$gambar->sampul);
        Artikel::where('id', $id)->delete();
        return redirect()->route('artikel.index')->with('success', 'Data Artikel Berhasil di Hapus!');
    }
}
