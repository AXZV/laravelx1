<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crud extends Model
{
    protected $tabel = 'cruds';
    protected $id    = 'id';
    protected $fill  = [
        'nama_siswa',
        'alamat',
        'nomor_telepon',
        'saldo',
        'created_at',
        'updated_at'
    ];
}
