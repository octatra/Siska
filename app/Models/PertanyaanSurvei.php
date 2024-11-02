<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanSurvei extends Model
{
    use HasFactory;
    protected $table = 'pertanyaan_survei';
    protected $fillable = ['id_survei', 'pertanyaan', 'jenis_pertanyaan', 'opsi1', 'opsi2', 'opsi3', 'opsi4'];

    public function survei()
    {
        return $this->belongsTo(Survei::class, 'id_survei');
    }
}
