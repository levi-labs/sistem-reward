<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Atasan extends Model
{
    use HasFactory;

    protected $table = 'atasan';


        public function getNPK(){
        //  $form_name = 'NPK';
        // $kodeAdministrasi = '321608';


        $date = Carbon::now()->format('dm');
        $atasan = Atasan::count();

        if ($atasan == 0) {
            $antrian = 00001;
            $nomor = '055' . $date . sprintf('%05s', $antrian);
        } else {
            $last = Atasan::all()->last();
            $urut = (int)substr($last->npk, -5) + 1;

            $nomor = '055' . $date  . sprintf('%05s', $urut);
        }

        return $nomor;
    }
}
