<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    protected $fillable = ['npk','nama','line_produksi','email','no_hp'];


    public function getNPK(){
        //  $form_name = 'NPK';
        // $kodeAdministrasi = '321608';


        $date = Carbon::now()->format('dm');
        $ktp = Karyawan::count();

        if ($ktp == 0) {
            $antrian = 00001;
            $nomor = '022' . $date . sprintf('%05s', $antrian);
        } else {
            $last = Karyawan::all()->last();
            $urut = (int)substr($last->npk, -5) + 1;

            $nomor = '022' . $date  . sprintf('%05s', $urut);
        }

        return $nomor;
    }


}
