<?php

namespace App\Http\Controllers;

use App\Models\Atasan;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class AtasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title  = 'Daftar Atasan';

        $data   = Atasan::all();

        return view('pages.atasan.index', ['title' => $title , 'data' => $data]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Form Atasan';
        $npk = new User();

        return view('pages.atasan.tambah', ['title' => $title, 'npk' => $npk->getNPK()]);
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
            'npk'     => 'required',
            'nama'    => 'required',
            'email'   => 'required',
            'jabatan' => 'required',
           
        ]);

        try {
             $atasan             = new Atasan();
            $getNpk             = new Karyawan();
            $user               = new User();
            $user->username     = $user->getNPK();;
            $user->email        = $request->email;
            $user->password     = bcrypt($user->username);
            $user->akses_user   = 'atasan' ;
            $user->save();

           
            $atasan->npk        = $user->username;
            $atasan->nama       = $request->nama;
            $atasan->jabatan    = $request->jabatan;
            $atasan->email      = $request->email;
            $atasan->no_hp      = $request->no_hp;
            $atasan->user_id    = $user->id;
            $atasan->save();
    
            return redirect('daftar-atasan')->with('success', 'Atasan Berhasil ditambah...!');
        } catch (\Exception $e) {
            return redirect('daftar-atasan')->with('failed', $e->getMessage());
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
        $title      = 'Form Edit Atasan';
        $atasan     = Atasan::where('id', $id)->first();

        return view('pages.atasan.edit', ['title' => $title, 'atasan' => $atasan]);

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
            'npk'     => 'required',
            'nama'    => 'required',
            'email'   => 'required',
            'jabatan' => 'required',
           
        ]);

        try {
            $atasan     = Atasan::where('id', $id)->first();
            $user       = User::where('id', $atasan->user_id)->first();
            $user->email        = $request->email;
            $user->password     = bcrypt($user->username);
            $user->akses_user   = 'atasan' ;
            $user->save();


            $atasan->nama       = $request->nama;
            $atasan->jabatan    = $request->jabatan;
            $atasan->email      = $request->email;
            $atasan->no_hp      = $request->no_hp;
            $atasan->save();
          
          return redirect('daftar-atasan')->with('success', 'Atasan Berhasil diupdate...!');
        } catch (\Exception $e) {
           
            return redirect('daftar-atasan')->with('failed', $e);
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
            $atasan =  Atasan::where('id',$id)->first();

            $user = User::where('id', $atasan->user_id)->delete();
            $atasan->delete();

            return back()->with('success', 'Atasan Berhasil dihapus...!');
        } catch (\Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
      
    }
}
