<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
              $title = 'Daftar Karyawan';     
              $data = Karyawan::all();
                 
           
             return view('pages.karyawan.index', ['title' => $title, 'data' => $data]);
        

     }
        


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Form Karyawan';
        $npk = new User();
        return view('pages.karyawan.tambah', ['title' => $title, 'npk' => $npk->getNPK()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              $request->validate([
                'nama'          => 'required',
                'email'         => 'required',
                'line_produksi' => 'required',
                'no_hp'         => 'required',
            ]);
        try {
            $karyawan                   =  new Karyawan();
      
            $user                       = new User();
            $user->username             = $user->getNPK();
            $user->email                = $request->email;
            $user->password             = bcrypt($karyawan->getNPK());
            $user->akses_user           = 'karyawan';
            $user->save();
          
            $karyawan->nama             = $request->nama;
            $karyawan->npk              = $user->username;
            $karyawan->line_produksi    = $request->line_produksi;
            $karyawan->email            = $request->email;
            $karyawan->no_hp            = $request->no_hp;
            $karyawan->user_id          = $user->id;
            $karyawan->save();

            return redirect('/daftar-karyawan')->with('success', 'Karyawan Berhasil ditambahkan...!');
        } catch (\Exception $e) {
                return redirect('/daftar-karyawan')->with('failed', $e->getMessage());
        }
    


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title  = 'Form Edit Karyawan';
        $data   = Karyawan::where('id', $id)->first();

        return view('pages.karyawan.edit', ['data'=> $data, 'title' => $title]);  

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $request->validate([
            'nama'  => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'line_produksi' => 'required'
       ]);
       try {
        $karyawan = Karyawan::where('id', $id)->first();
        $user =  User::where('id', $karyawan->user_id)->first();

        $karyawan->nama            = $request->nama;
        $karyawan->email           = $request->email;
        $karyawan->no_hp           = $request->no_hp;
        $karyawan->line_produksi   = $request->line_produksi;

    
        $user->email               = $request->email;
        $user->update();
        $karyawan->update();

        if (auth()->user()->akses_user == 'karyawan') {
            return redirect('/dashboard')->with('success','Karyawan Berhasil diupdate...!');
        }elseif (auth()->user()->akses_user == 'atasan') {
            return redirect('/daftar-karyawan')->with('success','Karyawan Berhasil diupdate...!');
        }

      
       } catch (\Exception $e) {
        return redirect('/daftar-karyawan')->with('success',$e->getMessage());
       }
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $karyawan = Karyawan::where('id', $id)->first();
            $user       = User::where('id', $karyawan->user_id)->delete();
            $karyawan->delete();
            return back()->with('success' ,'Karyawan Berhasil dihapus...!');
        } catch (\Exception $e) {
             return back()->with('success' ,$e->getMessage());
        }
       
    }
}
