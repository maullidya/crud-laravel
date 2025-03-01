<?php

namespace App\Http\Controllers;

use App\Models\petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class petugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        
        if (strlen($katakunci)) {
            $data = petugas::where('id_petugas', 'like', "%$katakunci%")
                ->orWhere('nama_petugas', 'like', "%$katakunci%")
                ->orWhere('username', 'like', "%$katakunci%")
                ->orWhere('password', 'like', "%$katakunci%")
                ->orWhere('telp', 'like', "%$katakunci%")
                ->orWhere('level', 'like', "%$katakunci%")
                ->orWhere('email', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = petugas::orderBy('id_petugas', 'desc')->paginate($jumlahbaris);
        }
        
        return view('petugas.index')->with('data', $data);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama_petugas', $request->nama_petugas);
        Session::flash('username', $request->username);
        Session::flash('password', $request->password);
        Session::flash('telp', $request->telp);
        Session::flash('level', $request->level);
        Session::flash('email', $request->email);
        $request->validate([
        'nama_petugas' => 'required',
        'username' => 'required',
        'password' => 'required',
        'email' => 'required',
        'telp' => 'required',
        'level' => 'required'
        ],[
            'nama_petugas.required'=>'Nama wajib diisi',
            'username.required'=>'username wajib diisi',
            'password.required'=>'password wajib diisi',
            'email.required'=>'email wajib diisi',
            'telp.required'=>'telp wajib diisi',
            'level.required'=>'level wajib diisi',
        ]);
       

        $data = [
        'nama_petugas'=>$request->nama_petugas,    
        'username'=>$request->username,  
        'password'=>$request->password,  
        'email'=>$request->email, 
        'telp'=>$request->telp, 
        'level'=>$request->level, 
        ];
        petugas::create($data);
        return redirect()->to('petugas')->with('success','Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_petugas)
    {
       $data = petugas::where('id_petugas',$id_petugas)->first();
       return view('petugas.edit')->with ('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_petugas)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'telp' => 'required|numeric',
            'level' => 'required'
        ]);

        // Ambil data petugas berdasarkan ID yang diberikan
        $petugas = Petugas::findOrFail($id_petugas);

        // Update data petugas dengan data baru dari formulir
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->username = $request->username;
        $petugas->password = $request->password;
        $petugas->email = $request->email;
        $petugas->telp = $request->telp;
        $petugas->level = $request->level;

        // Simpan perubahan ke dalam database
        $petugas->save();

        // Redirect ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('petugas')->with('success', 'Data petugas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        petugas::where('id_petugas',$id)->delete();
        return redirect()->to('petugas')->with('success','Berhasil menghapus data');
    }
}
