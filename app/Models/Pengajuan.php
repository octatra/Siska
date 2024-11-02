<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';
    protected $fillable = ['id_user', 'jenis_pengajuan', 'dokumen_lainnya', 'tujuan_pengajuan', 'tanggapan', 'email', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
