<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';

     public function getSs(){
        //  $form_name = 'NPK';
        // $kodeAdministrasi = '321608';


        $date = Carbon::now()->format('dm');
        $ss = Pengajuan::count();

        if ($ss == 0) {
            $antrian = 00001;
            $nomor = 'SS- ' . sprintf('%05s', $antrian);
        } else {
            $last = Pengajuan::all()->last();
            $urut = (int)substr($last->judul_pengajuan, -5) + 1;

            $nomor = 'SS- ' . sprintf('%05s', $urut);
        }

        return $nomor;
    }

    public function karyawans(){
        return $this->belongsTo(Karyawan::class, 'karyawan_id', 'id');
    }

}
