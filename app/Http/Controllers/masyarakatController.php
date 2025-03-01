<?php

namespace App\Http\Controllers;

use App\Models\masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class masyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        
        if (strlen($katakunci)) {
            $data = masyarakat::where('nik', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('username', 'like', "%$katakunci%")
                ->orWhere('password', 'like', "%$katakunci%")
                ->orWhere('no_telp', 'like', "%$katakunci%")
                ->orWhere('email', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = masyarakat::orderBy('nik', 'desc')->paginate($jumlahbaris);
        }
        
        return view('masyarakat.index')->with('data', $data);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masyarakat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nik', $request->nik);
        Session::flash('nama', $request->nama);
        Session::flash('username', $request->username);
        Session::flash('password', $request->password);
        Session::flash('no_telp', $request->no_telp);
        Session::flash('email', $request->email);
        $request->validate([
        'nik' => 'required|numeric|unique:masyarakat,nik',
        'nama' => 'required',
        'username' => 'required'
        ],[
            'nik.required'=>'nik wajib diisi',
            'nik.numeric'=>'nik wajib diisi dengan angka',
            'nik.unique'=>'nik yang diisi sudah ada dalam data',
            'nama.required'=>'Nama wajib diisi',
            'username.required'=>'username wajib diisi',
            'password.required'=>'password wajib diisi',
            'email.required'=>'email wajib diisi',
            'no_telp.required'=>'no.telp wajib diisi',
        ]);
       

        $data = [
        'nik'=>$request->nik,    
        'nama'=>$request->nama,    
        'username'=>$request->username,  
        'password'=>$request->password,  
        'email'=>$request->email,  
        'no_telp'=>$request->no_telp,  
        ];
        masyarakat::create($data);
        return redirect()->to('masyarakat')->with('success','Berhasil menambah data');
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
       $data = masyarakat::where('nik',$id)->first();
       return view('masyarakat.edit')->with ('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            ],[                
                'nama.required'=>'Nama wajib diisi',
                'username.required'=>'username wajib diisi',
                'password.required'=>'password wajib diisi',
                'email.required'=>'email wajib diisi',
                'no_telp.required'=>'no.telp wajib diisi',
            ]);
           
    
            $data = [
            'nama'=>$request->nama,    
            'username'=>$request->username,   
            'password'=>$request->password,   
            'email'=>$request->email,
            'no_telp'=>$request->no_telp,
            ];

            masyarakat::where('nik',$id)->update($data);
        return redirect()->to('masyarakat')->with('success','Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        masyarakat::where('nik',$id)->delete();
        return redirect()->to('masyarakat')->with('success','Berhasil menghapus data');
    }
}
