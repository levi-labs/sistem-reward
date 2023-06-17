<?php

namespace App\Http\Controllers;

use App\Http\Requests\RewardRequest;
use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RangeRewardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Total Nilai - Reward';
        $data = Reward::all();

        return view('pages.reward.index', ['title' => $title, 'data' => $data]);
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Form Range Total Penilaian - Reward';

        return view('pages.reward.tambah', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RewardRequest $request)
    {
        try {
            $reward = new Reward();
            $reward->range_total        = $request->range_total;
            $reward->nominal_reward     = $request->nominal_reward;
            $reward->save();

            return redirect('daftar-range-total-reward')->with('success', 'Total Nilai dan Reward Berhasil ditambah...!');
        } catch (\Exception $e) {
            return redirect('daftar-range-total-reward')->with('failed', $e->getMessage());
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
        $title = 'Form Edit Range Total Nilai - Reward';
        $reward = Reward::where('id', $id)->first();

        return view('pages.reward.edit', ['title' => $title, 'reward' => $reward]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RewardRequest $request, $id)
    {
         try {
            $reward =Reward::where('id', $id)->first();
            $reward->range_total        = $request->range_total;
            $reward->nominal_reward     = $request->nominal_reward;
            $reward->update();

            return redirect('daftar-range-total-reward')->with('success', 'Total Nilai dan Reward Berhasil diupdate...!');
        } catch (\Exception $e) {
            return redirect('daftar-range-total-reward')->with('failed', $e->getMessage());
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
        Reward::where('id', $id)->delete();

        return back()->with('success', 'Total Nilai dan Reward Berhasil dihapus...!');
    }
}
