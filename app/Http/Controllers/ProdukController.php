<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Mitra;
use App\Kategori;
use DB;
class ProdukController extends Controller
{

    public function produk_admin()
    {
         $datas = DB::table('produk')
            ->join('mitra', 'mitra.id_mitra', '=', 'produk.id_mitra')
            ->join('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori')
            ->select('mitra.*','kategori.*', 'produk.*')
            ->get();

            return view('admin.produk_admin', compact('datas'));
    }
    public function index(){

            $kategori = Kategori::all();
            
            $datas = DB::table('produk')
            ->join('mitra', 'mitra.id_mitra', '=', 'produk.id_mitra')
            ->join('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori')
            ->select('mitra.*','kategori.*', 'produk.*')
            ->where('produk.id_mitra', session('id_mitra'))
            ->get();

            return view('mitra.produk.produk', compact('datas', 'kategori'));
    }

    public function create(Request $request){
        $request->validate([
            'nama_produk'           => 'required|min:3|string|max:100', 
            'deskripsi'             => 'required|string|min:5',
            'harga'                 => 'required|string',
            'qty'                   => 'required|string',
            'satuan'                => 'required|string',
            'berat'                 => 'required|string',
            'id_kategori'           => 'required|string',
            'foto'                  => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
            
        ],
        [
            'nama_produk.min'               => 'Nama Produk minimal 3',
            'nama_produk.required'          => 'Nama Produk harus diisi',
            'harga.required'                => 'Harga harus diisi',
            'qty.required'                  => 'Qty harus diisi',
            'satuan.required'               => 'Satuan harus diisi',
            'berat.required'                => 'Berat harus diisi',
            'id_kategori.required'          => 'Kategori harus diisi',
            'deskripsi.required'            => 'Deskripsi harus diisi', 
            'max'                           => 'panjang karakter maksima 100',
            'mimes'                         => 'format gambar tidak didukung'
        ]);

    	$data = new Produk();
    	$data->nama_produk = $request->nama_produk;
    	$data->deskripsi = $request->deskripsi;
        $data->harga = $request->harga;
        $data->qty = $request->qty;
        $data->satuan = $request->satuan;
        $data->berat = $request->berat;
        $data->id_mitra = $request->id_mitra;
        $data->id_kategori = $request->id_kategori;

    	$image      = $request->file('foto');
        $imageName  = time() . "_" . $image->getClientOriginalName();
        $image->move(public_path('images/foto_produk/'), $imageName);
        $data->foto = $imageName;
        $data->save();
        return redirect()->back()->with('success', 'Data berhasil ditambah');
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama_produk'           => 'required|min:3|string|max:100', 
            'deskripsi'             => 'required|string|min:5',
            'harga'                 => 'required|string',
            'qty'                   => 'required|string',
            'satuan'                => 'required|string',
            'berat'                 => 'required|string',
            'id_kategori'           => 'required|string',
            'foto'                  => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
            
        ],
        [
            'nama_produk.min'               => 'Nama Produk minimal 3',
            'nama_produk.required'          => 'Nama Produk harus diisi',
            'harga.required'                => 'Harga harus diisi',
            'qty.required'                  => 'Qty harus diisi',
            'satuan.required'               => 'Satuan harus diisi',
            'berat.required'                => 'Berat harus diisi',
            'id_kategori.required'          => 'Kategori harus diisi',
            'deskripsi.required'            => 'Deskripsi harus diisi', 
            'max'                           => 'panjang karakter maksima 100',
            'mimes'                         => 'format gambar tidak didukung'
        ]);

    	$data = Produk::findOrFail($id);
        $data->nama_produk = $request->input('nama_produk');
        $data->deskripsi = $request->input('deskripsi');
        $data->harga = $request->input('harga');
        $data->qty = $request->input('qty');
        $data->satuan = $request->input('satuan');
        $data->berat = $request->input('berat');
        $data->id_kategori = $request->input('id_kategori');
        
        if (empty($request->file('foto')))
        {
            $data->foto = $data->foto;
        }
        else{
            unlink('images/foto_produk/'.$data->foto); //menghapus file lama
            $foto = $request->file('foto');
            $ext = $foto->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $foto->move('images/foto_produk',$newName);
            $data->foto = $newName;
        }
        $data->save();
        return redirect()->back()->with('success', 'Data berhasil didubah');
    }

    public function delete($id)
    {
        $data = Produk::findOrFail($id);
        try {
            $data->delete();
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Gagal Dihapus');
        }
    }
}
