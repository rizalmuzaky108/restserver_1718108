<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baju;

class BajuController extends Controller
{
    public function data($id = null){
        if ($id !== null) $daftar_baju = Baju::find($id);
        else $daftar_baju = Baju::all();
        return response([
            'status' => true,
            'message' => 'Daftar baju',
            'data' => $daftar_baju
        ], 200);
    }


    public function insert_data_baju(Request $request){
        $insert_baju = new Baju;
        $insert_baju->merek = $request->merek;
        $insert_baju->nama = $request->nama;
        $insert_baju->jenis = $request->jenis;
        $insert_baju->ukuran = $request->ukuran;
        $insert_baju->harga = $request->harga;
        $insert_baju->save();
        return response([
            'status' => true,
            'message' => 'Data Baju Ditambahkan',
            // 'data' => $insert_barang
        ], 200);
    }

    public function update_data_baju(Request $request, $id){
        //cek terlebih dahulu data yang akan di-update melalui id
        //apakah barang ada atau tidak, jika tidak return not found
        $check_baju = Baju::firstWhere('id', $id);
        if($check_baju){
            // echo 'data yang anda cari tersedia';
            // $requestData = json_decode($request->getContent(), true);
            $data_baju = Baju::find($id);
            $data_baju->merek = $request->input('merek');
            $data_baju->nama = $request->input('nama');
            $data_baju->jenis = $request->input('jenis');
            $data_baju->ukuran = $request->input('ukuran');
            $data_baju->harga = $request->input('harga');
            $data_baju->save();
            return response([
                'status' => true,
                'message' => 'Data Berhasil Dirubah',
                // 'update-data' => $data_barang
            ], 200);
        } else {
            // echo 'tidak ada';
            return response([
                'status' => false,
                'message' => 'Kode Barang Tidak ditemukan'
            ], 404);
        }
    }

    public function delete_data_baju($id){
        //cek terlebih dahulu data yang akan hapus melalui id
        //apakah barang ada atau tidak, jika tidak return not found
        $check_baju = Baju::firstWhere('id', $id);
        if($check_baju){
            Baju::destroy($id);
            return response([
                'status' => true,
                'message' => 'Data Dihapus',
            ], 200);
        } else {
            return response([
                'status' => false,
                'message' => 'Kode Baju Tidak ditemukan'
            ], 404);
        }
    }
}
