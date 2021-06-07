<?php

namespace App\Http\Controllers;
use DB;
Use App\Alat;
Use App\Mitra;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index()
    {
        $datas = DB::table('alat')
    		->join('mitra', 'mitra.id_mitra', '=', 'alat.id_mitra')
    		->select('mitra.*','alat.*')
    		->where('alat.id_mitra', session('id_mitra'))
    		->get();
    	return view('mitra.alat_tani.alattani', compact('datas'));
    }
    
    public function create(Request $request){

        $request->validate([
            'nama_alat'      => 'required|min:3|string', 
            'desc'           => 'required|string|min:5',
            'harga'          => 'required|string',
            'status'         => 'required|string',
            'foto'           => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
            
        ],
        [
            'nama_alat.min'              => 'Nama Alat minimal 3',
            'nama_alat.required'         => 'Nama Alat harus diisi',
            'harga.required'             => 'Harga harus diisi',
            'status.required'            => 'Status harus diisi',
            'desc.required'              => 'Deskripsi harus diisi', 
            'max'                        => 'panjang karakter maksima 100',
            'mimes'                      => 'format gambar tidak didukung'
        ]);

    	$data = new Alat();
    	$data->nama_alat = $request->nama_alat;
    	$data->desc = $request->desc;
        $data->harga = $request->harga;
        $data->status = $request->status;
        $data->id_mitra = $request->id_mitra;

    	$image      = $request->file('foto');
        $imageName  = time() . "_" . $image->getClientOriginalName();
        $image->move(public_path('images/foto_alat/'), $imageName);
        $data->foto = $imageName;
        $data->save();
        return redirect()->back()->with('success', 'Data berhasil ditambah');
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama_alat'      => 'required|min:3|string|max:100', 
            'desc'           => 'required|string|min:5',
            'harga'          => 'required|string',
            'status'         => 'required|string',
            'foto'           => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
            
        ],
        [
            'nama_alat.unique'           => 'Nama Alat sudah ada yang pakai',
            'nama_alat.min'              => 'Nama Alat minimal 3',
            'nama_alat.required'         => 'Nama Alat harus diisi',
            'harga.required'             => 'Harga harus diisi',
            'status.required'            => 'Status harus diisi',
            'desc.required'              => 'Deskripsi harus diisi', 
            'max'                        => 'panjang karakter maksima 100',
            'mimes'                      => 'format gambar tidak didukung'
        ]);

    	$data = Alat::findOrFail($id);
       
        $data->nama_alat = $request->input('nama_alat');
        $data->desc = $request->input('desc');
        $data->harga = $request->input('harga');
        $data->status = $request->input('status');
        
        if (empty($request->file('foto')))
        {
            $data->foto = $data->foto;
        }
        else{
            unlink('images/foto_alat/'.$data->foto); //menghapus file lama
            $foto = $request->file('foto');
            $ext = $foto->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $foto->move('images/foto_alat',$newName);
            $data->foto = $newName;
        }
        $data->save();
        return redirect()->back()->with('success', 'Data berhasil didubah');
    }

    public function delete($id)
    {
        $data = Alat::findOrFail($id);
        try {
            $data->delete();
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Gagal Dihapus');
        }
    }
}