<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class YayasanController extends Controller
{
    public function index(){
        $no = 1;
        $yayasan = DB::table('yayasan')->get();
        return view('backend.data_yayasan', compact('yayasan','no'));
    }
    public function create(){
        $yayasan=null;
        return view('backend.tambah_yayasan', compact('yayasan'));
    }
    public function store(Request $request){
        if ($request->hasFile('dokumentasi')) {
            # code...
            $dokumentasi = $request->file('dokumentasi');
            $namadokumen = $dokumentasi->getClientOriginalName();
            $pathdoukumen = $dokumentasi->move('images',$namadokumen);
            DB::table('yayasan')->insert([
                'nama_yayasan'=>$request->yayasan,
                'alamat'=>$request->alamat,
                'no_telp'=>$request->notelp,
                'dokumentasi'=>$namadokumen
            ]);
        }
        return redirect()->route('yayasan.index')->with('success','Data Yayasan Telah Tersimpan');
    }
    public function edit($id){
        $yayasan=DB::table('yayasan')->where('id',$id)->first();
        return view('backend.tambah_yayasan',compact('yayasan'));
    }
    public function update(Request $request){
         DB::table('yayasan')->where('id',$request->id)->update([
                'nama_yayasan'=>$request->yayasan,
                'alamat'=>$request->alamat,
                'no_telp'=>$request->notelp,
                'dokumentasi'=>'1'
            ]);
            return redirect()->route('yayasan.index')->with('success','Data Yayasan Telah Diperbaharui');
            }
    public function destroy($id){
        $gambar = DB::table('yayasan')->where('id',$id)->first();
        File::delete('images/'.$gambar->dokumentasi);
        DB::table('yayasan')->where('id',$id)->delete();
        return redirect()->route('yayasan.index')->with('error','Data Yayasan Telah Dihapus');
    }
}
