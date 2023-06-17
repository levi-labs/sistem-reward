<?php

namespace App\Models;

use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;



    public function karyawans(){
        return $this->hasOne(Karyawan::class, 'user_id', 'id');
    }
     public function atasans(){
        return $this->hasOne(Atasan::class, 'user_id', 'id');
    }

       public function getNPK(){
        //  $form_name = 'NPK';
        // $kodeAdministrasi = '321608';


        $date = Carbon::now()->format('dm');
        $user = User::count();

        if ($user == 0) {
            $antrian = 00001;
            $nomor = '022' . $date . sprintf('%05s', $antrian);
        } else {
            $last = User::all()->last();
            $urut = (int)substr($last->username, -5) + 1;

            $nomor = '022' . $date  . sprintf('%05s', $urut);
        }

        return $nomor;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
