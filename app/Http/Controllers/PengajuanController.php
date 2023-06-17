<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->akses_user == 'karyawan') {
              $id     = auth()->user()->karyawans->id;
              $title  = 'Daftar Pengajuan';
              $data   = Pengajuan::where('karyawan_id',$id)->where('status_pengajuan', 'PENDING')->get();
        // dd($data);
              return view('pages.pengajuan.index', ['title' => $title, 'data' => $data]);
        }else{
            //   $id     = auth()->user()->atasans->id;
              $title  = 'Daftar Pengajuan';
              $data   = Pengajuan::all();

              return view('pages.pengajuan.index', ['title' => $title, 'data' => $data]);
        }
     
    }

    public function indexApproved(){
        $title = 'Daftar Approved';
        $data = Pengajuan::where('status_pengajuan', 'APPROVED')->get();


        return view('pages.pengajuan.approved', ['title' => $title, 'data' => $data]);
    }

    public function indexRejected(){
        $title = 'Daftar Approved';
        $data = Pengajuan::where('status_pengajuan', 'REJECTED')->get();

        return view('pages.pengajuan.rejected', ['title' => $title, 'data' => $data]);
    }

    public function approve($id){
        $pengajuan = Pengajuan::where('id', $id)->first();
        $pengajuan->status_pengajuan = 'APPROVED';
        $pengajuan->update();

        return back()->with('success', 'Pengajuan Berhasil diapprove...!');

    }

    public function reject($id){
        $pengajuan  = Pengajuan::where('id', $id)->first();
        $pengajuan->status_pengajuan = 'REJECTED';
        $pengajuan->update();

        return back()->with('success', 'Pengajuan Berhasil direject...!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title  = 'Form Pengajuan';
        $judul = new Pengajuan();

        return view('pages.pengajuan.tambah',['title' => $title, 'judul' => $judul->getSs()]);
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
            'judul_pengajuan'   => 'required',
            'tanggal_pengajuan' => 'required',
            'status_karyawan'   => 'required',
            'kondisi_sebelum'   => 'required',
            'kondisi_sesudah'   => 'required'
        ]);
        try {
         $pengajuan                     = new Pengajuan();
         $pengajuan->nama               = auth()->user()->karyawans->nama;
         $pengajuan->npk                = auth()->user()->karyawans->npk;
         $pengajuan->karyawan_id        = auth()->user()->karyawans->id;
         $pengajuan->status_karyawan    = $request->status_karyawan;
         $pengajuan->tanggal_pengajuan  = $request->tanggal_pengajuan;
         $pengajuan->judul_pengajuan    = $pengajuan->getSs();
         $pengajuan->kondisi_sebelum    = $request->kondisi_sebelum;
         $pengajuan->kondisi_sesudah    = $request->kondisi_sesudah;
         $pengajuan->status_pengajuan   = 'PENDING';
         $pengajuan->save();

         return redirect('/daftar-pengajuan')->with('success' ,'Pengajuan Berhasil dibuat...!');
        } catch (\Exception $e) {
        
            return redirect('/daftar-pengajuan')->with('failed' ,$e->getMessage());
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
        $title = 'Detail Pengajuan';

        $pengajuan = Pengajuan::where('id', $id)->first();
        $nilai = Nilai::where('pengajuan_id', $id )->first();
        if ($nilai != null) {
             $nilai = Nilai::where('pengajuan_id', $id )->first();
             return view('pages.pengajuan.detail', ['title' => $title, 'pengajuan' => $pengajuan , 'nilai' => $nilai]);
        }else{
            $nilai = 0;
            return view('pages.pengajuan.detail', ['title' => $title, 'pengajuan' => $pengajuan , 'nilai' => $nilai]);
        }

       

   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $title = 'Form Edit Pengajuan';
       $pengajuan = Pengajuan::where('id', $id)->first();
       

       return view('pages.pengajuan.edit', ['title' => $title,'pengajuan' => $pengajuan]);
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
            'status_karyawan'   => 'required',
            'tanggal_pengajuan' => 'required',
            'judul_pengajuan'   => 'required',
            'kondisi_sebelum'   => 'required',
            'kondisi_sesudah'   => 'required'
        ]);
        try {

         $pengajuan                     = Pengajuan::where('id', $id)->first();
         $pengajuan->nama               = auth()->user()->karyawans->nama;
         $pengajuan->npk                = auth()->user()->karyawans->npk;
         $pengajuan->status_karyawan    = $request->status_karyawan;
         $pengajuan->tanggal_pengajuan  = $request->tanggal_pengajuan;
         $pengajuan->judul_pengajuan    = $request->judul_pengajuan;
         $pengajuan->kondisi_sebelum    = $request->kondisi_sebelum;
         $pengajuan->kondisi_sesudah    = $request->kondisi_sesudah;
         $pengajuan->update();

         return redirect('/daftar-pengajuan')->with('success' ,'Pengajuan Berhasil diupdate...!');
        } catch (\Exception $e) {
        
            return redirect('/daftar-pengajuan')->with('failed' ,$e->getMessage());
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
        Pengajuan::where('id', $id)->delete();

        return back()->with('success','Pengajuan Berhasil dihapus...!');
    }
}
