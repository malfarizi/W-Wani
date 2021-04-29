<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
    	$datas = Kategori::all();
    	return view('admin.kategori.kategori', compact('datas'));
    }

     public function create(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|min:3',
            

        ],
        [
            'nama_kategori.required'    => 'Nama Kategori harus diisi',
            'max'                       => 'panjang karakter maksimal 100',
        ]);
        $data = $request->only('nama_kategori');
        Kategori::create($data);
        return redirect()->back()->with('success', 'Data berhasil ditambah');
    }

    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' 		=> 'required|min:3|string',
        ],
        [
            'nama_kategori.required'    		=> 'Nama Kategori harus diisi',
            'nama_kategori.min'         		=> 'Nama Kategori minimal 3',
            'max'                       	=> 'panjang karakter maksimal 100',
        ]);

        $data = $request->only('nama_kategori');
        Kategori::whereIdKategori($id)->update($data);
        return redirect()->back()->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $data = Kategori::findOrFail($id);
        try {
            $data->delete();
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Gagal Dihapus');
        }
    }
}
