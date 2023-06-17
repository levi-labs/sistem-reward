<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';

    public $timestamps =false;

    public function pengajuans(){

        return $this->belongsTo(Pengajuan::class, 'pengajuan_id', 'id');
    }

    public function karyawans(){
        return $this->belongsTo(Karyawan::class, 'karyawan_id', 'id');
    }

}
