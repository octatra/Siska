<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JawabanSurvei extends Model
{
    protected $table = 'jawaban_survei';
    protected $fillable = ['id_hasil_survei', 'jawaban_survei'];

    public function pertanyaanSurvei()
    {
        return $this->belongsTo(HasilSurvei::class, 'id_hasil_survei');
    }
}
