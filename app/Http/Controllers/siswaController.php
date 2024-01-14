<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        
        if (strlen($katakunci)) {
            $data = siswa::where('nisn', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('jurusan', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = siswa::orderBy('nisn', 'desc')->paginate($jumlahbaris);
        }
        
        return view('siswa.index')->with('data', $data);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nisn', $request->nisn);
        Session::flash('nama', $request->nama);
        Session::flash('jurusan', $request->jurusan);
        $request->validate([
        'nisn' => 'required|numeric|unique:siswa,nisn',
        'nama' => 'required',
        'jurusan' => 'required'
        ],[
            'nisn.required'=>'NISN wajib diisi',
            'nisn.numeric'=>'NISN wajib diisi dengan angka',
            'nisn.unique'=>'NISN yang diisi sudah ada dalam data',
            'nama.required'=>'Nama wajib diisi',
            'jurusan.required'=>'Jurusan wajib diisi',
        ]);
       

        $data = [
        'nisn'=>$request->nisn,    
        'nama'=>$request->nama,    
        'jurusan'=>$request->jurusan   
        ];
        siswa::create($data);
        return redirect()->to('siswa')->with('success','Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $data = siswa::where('nisn',$id)->first();
       return view('siswa.edit')->with ('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'jurusan' => 'required'
            ],[                
                'nama.required'=>'Nama wajib diisi',
                'jurusan.required'=>'Jurusan wajib diisi',
            ]);
           
    
            $data = [
            'nama'=>$request->nama,    
            'jurusan'=>$request->jurusan   
            ];

            siswa::where('nisn',$id)->update($data);
        return redirect()->to('siswa')->with('success','Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        siswa::where('nisn',$id)->delete();
        return redirect()->to('siswa')->with('success','Berhasil menghapus data');
    }
}
