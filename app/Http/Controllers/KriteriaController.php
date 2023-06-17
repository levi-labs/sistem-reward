<?php

namespace App\Http\Controllers;

use App\Http\Requests\KriteriaRequest;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Kriteria Penilaian Kinerja';
        $data = Kriteria::all();

    

        return view('pages.kriteria.index', ['title' =>  $title , 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Form Kriteria Kinerja';

        return view('pages.kriteria.tambah', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KriteriaRequest $request)
    {

        try {
            $kriteria = new Kriteria();

            $kriteria->kriteria_kinerja     = $request->kriteria_kinerja;
            $kriteria->range_nilai          = $request->range_nilai;
            $kriteria->save();

            return redirect('/daftar-kriteria-penilaian')->with('success','Kriteria Kinerja Berhasil ditambah...!');
        } catch (\Exception $e) {
            return redirect('/daftar-kriteria-penilaian')->with('failed',$e->getMessage());
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
        $title    = 'Form Edit Kriteria Kinerja';
        $kriteria = Kriteria::where('id', $id)->first();

        return view('pages.kriteria.edit', ['title' => $title, 'kriteria' => $kriteria]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KriteriaRequest $request, $id)
    {
         try {
            $kriteria = Kriteria::where('id', $id)->first();

            $kriteria->kriteria_kinerja     = $request->kriteria_kinerja;
            $kriteria->range_nilai          = $kriteria->setRangeAttribute($request->range_nilai);
            $kriteria->save();

            return redirect('/daftar-kriteria-penilaian')->with('success','Kriteria Kinerja Berhasil diupdate...!');
        } catch (\Exception $e) {
            return redirect('/daftar-kriteria-penilaian')->with('failed',$e->getMessage());
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
        Kriteria::where('id', $id)->delete();

        return back()->with('success', 'Kriteria Berhasil dihapus...!');
    }
}
