<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    
    public $timestamps = false;

    public function setRangeAttribute($value){
        return $this->attributes['range_nilai'] =  trim( $value);
    }

}
