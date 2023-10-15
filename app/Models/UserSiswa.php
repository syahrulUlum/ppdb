<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSiswa extends Authenticatable
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'user_siswa';

    public function data_siswa()
    {
        return $this->hasOne(DataSiswa::class);
    }

    public function data_alamat()
    {
        return $this->hasOne(DataAlamat::class);
    }

    public function data_ortu()
    {
        return $this->hasOne(DataOrtu::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
