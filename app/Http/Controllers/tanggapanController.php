<?php

namespace App\Http\Controllers;

use App\Models\tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class tanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        
        if (strlen($katakunci)) {
            $data = tanggapan::where('id_tanggapan', 'like', "%$katakunci%")
                ->orWhere('id_pengaduan', 'like', "%$katakunci%")
                ->orWhere('tgl_tanggapan', 'like', "%$katakunci%")
                ->orWhere('tanggapan', 'like', "%$katakunci%")
                ->orWhere('id_petugas', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = tanggapan::orderBy('id_tanggapan', 'desc')->paginate($jumlahbaris);
        }
        
        return view('tanggapan.index')->with('data', $data);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tanggapan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_pengaduan', $request->id_pengaduan);
        Session::flash('tgl_tanggapan', $request->tgl_tanggapan);
        Session::flash('tanggapan', $request->tanggapan);
        Session::flash('id_petugas', $request->id_petugas);
        $request->validate([
        'id_pengaduan' => 'required',
        'tgl_tanggapan' => 'required',
        'tanggapan' => 'required',
        'id_petugas' => 'required',
        ],[
            'id_pengaduan.required'=>'Nama wajib diisi',
            'tgl_tanggapan.required'=>'Tanggal wajib diisi',
            'tanggapan.required'=>'tanggapan wajib diisi',
            'id_petugas.required'=>'petugas wajib diisi',
        ]);
       

        $data = [
        'id_pengaduan'=>$request->id_pengaduan,    
        'tgl_pengaduan'=>$request->tgl_pengaduan,  
        'tanggapan'=>$request->tanggapan,  
        'id_petugas'=>$request->id_petugas,  
        ];
        tanggapan::create($data);
        return redirect()->to('tanggapan')->with('success','Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_tanggapan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_tanggapan)
    {
       $data = tanggapan::where('id_tanggapan',$id_tanggapan)->first();
       return view('tanggapan.edit')->with ('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_tanggapan)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'id_pengaduan' => 'required',
        'tgl_tanggapan' => 'required',
        'tanggapan' => 'required',
        'id_petugas' => 'required',
        ]);

        // Ambil data tanggapan berdasarkan ID yang diberikan
        $tanggapan = tanggapan::findOrFail($id_tanggapan);

        // Update data tanggapan dengan data baru dari formulir
        $tanggapan->id_pengaduan = $request->id_pengaduan;
        $tanggapan->tgl_tanggapan = $request->tgl_tanggapan;
        $tanggapan->tanggapan = $request->tanggapan;
        $tanggapan->id_petugas = $request->id_petugas;

        // Simpan perubahan ke dalam database
        $tanggapan->save();

        // Redirect ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('tanggapan')->with('success', 'Data tanggapan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        tanggapan::where('id_tanggapan',$id)->delete();
        return redirect()->to('tanggapan')->with('success','Berhasil menghapus data');
    }
}
