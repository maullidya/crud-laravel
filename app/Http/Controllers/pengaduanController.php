<?php

namespace App\Http\Controllers;

use App\Models\pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class pengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        
        if (strlen($katakunci)) {
            $data = pengaduan::where('id_pengaduan', 'like', "%$katakunci%")
                ->orWhere('tgl_pengaduan', 'like', "%$katakunci%")
                ->orWhere('nik', 'like', "%$katakunci%")
                ->orWhere('isi_laporan', 'like', "%$katakunci%")
                ->orWhere('foto', 'like', "%$katakunci%")
                ->orWhere('status', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = pengaduan::orderBy('id_pengaduan', 'desc')->paginate($jumlahbaris);
        }
        
        return view('pengaduan.index')->with('data', $data);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('tgl_pengaduan', $request->tgl_pengaduan);
        Session::flash('nik', $request->nik);
        Session::flash('isi_laporan', $request->isi_laporan);
        Session::flash('foto', $request->telp);
        
        $request->validate([
        'tgl_pengaduan' => 'required',
        'nik' => 'required',
        'isi_laporan' => 'required',
        ],[
            'tgl_pengaduan.required'=>'Ta wajib diisi',
            'nik.required'=>'NIK wajib diisi',
            'isi_laporan.required'=>'Laporan wajib diisi',
        ]);
       

        $data = [
        'tgl_pengaduan'=>$request->tgl_pengaduan,    
        'nik'=>$request->nik,  
        'isi_laporan'=>$request->isi_laporan,  
        'foto'=>$request->foto, 
        ];
        pengaduan::create($data);
        return redirect()->to('pengaduan')->with('success','Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_pengaduan)
    {
       $data = pengaduan::where('id_pengaduan',$id_pengaduan)->first();
       return view('pengaduan.edit')->with ('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_pengaduan)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'tgl_pengaduan' => 'required',
        'nik' => 'required',
        'isi_laporan' => 'required',
        ]);

        // Ambil data petugas berdasarkan ID yang diberikan
        $pengaduan = pengaduan::findOrFail($id_pengaduan);

        // Update data petugas dengan data baru dari formulir
        $pengaduan->tgl_pengaduan = $request->tgl_pengaduan;
        $pengaduan->nik = $request->nik;
        $pengaduan->isi_laporan = $request->isi_laporan;
        // Simpan perubahan ke dalam database
        $pengaduan->save();

        // Redirect ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('pengaduan')->with('success', 'Data pengaduan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pengaduan::where('id_pengaduan',$id)->delete();
        return redirect()->to('pengaduan')->with('success','Berhasil menghapus data');
    }
}
