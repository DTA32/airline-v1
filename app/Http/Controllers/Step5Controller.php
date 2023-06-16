<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesanan;
use App\Models\pemesanan_penumpang;
use App\Models\pemesanan_harga;
use Illuminate\Support\Facades\Session;

class Step5Controller extends Controller
{
    public function post(Request $request){
        // buat pemesanan baru
        $pemesanan = pemesanan::create([
            'penerbangan_id' => $request->input('penerbangan_id'),
            'status' => 0,
            'metode_pembayaran' => 0,
            'referensi_pembayaran' => '0',
            'kelas_penerbangan_id' => $request->input('kelas')
        ]);
        $pemesanan->save();
        // update penumpang dengan pemesanan_id
        // harusnya pake dibawah ini kalo lebih dari 1, tapi ga sempet
        // foreach($request->input('penumpang') as $penumpang){
        //     $penumpang->where('id', $penumpang)->update(['pemesanan_id' => $pemesanan->id]);
        // }
        // sementara pake ini
        // $penumpang = pemesanan_penumpang::where('id', $request->input('penumpang'))->update(['pemesanan_id' => $pemesanan->id]);
        // update detail harga dengan pemesanan_id
        // $harga = pemesanan_harga::where('id', $request->input('$harga'))->update(['pemesanan_id' => $pemesanan->id]); // !!! ga masuk !!!

        $penumpangss[] = $request->session()->get('penumpang');
        foreach($penumpangss as $penumpangs){
            $newPenumpang['pemesanan_id'] = $pemesanan->id;
            $newPenumpang['nama'] = $penumpangs['nama'];
            $newPenumpang['kursi_penerbangan_id'] = null; // EDIT!
            pemesanan_penumpang::create($newPenumpang);
        }

        $harga = $request->session()->get('harga');
        pemesanan_harga::create([
            'pemesanan_id' => $pemesanan->id,
            'biaya_dasar' => $harga['biaya_dasar'],
            'kuantitas' => $harga['kuantitas'],
            'biaya_layanan' => $harga['biaya_layanan'],
            'total' => $harga['total']
        ]);

        return view('step5', ['pemesanan' => $pemesanan, 'harga' => $harga]);
    }
    public function get(Request $request){
        return view('step53', ['pemesanan_id' => $request->input('pemesanan_id')]);
        // if($request->input('metode_pembayaran' == 3)){
        // }
    }
    public function update(Request $request){
        $pemesanan = pemesanan::where('id', $request->input('pemesanan_id'))->first();
        $pemesanan->update([
            'status' => 1,
            'metode_pembayaran' => 3,
            'referensi_pembayaran' => 'XYZ456'
        ]);
        $pemesanan->save();
        $request->session()->flush();
        return view('home')->with('success', 'Pemesanan berhasil!');
    }
}
