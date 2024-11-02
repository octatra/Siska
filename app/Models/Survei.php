<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Survei extends Model
{
    use HasFactory;
    protected $table = 'survei';
    protected $fillable = ['priode_survei', 'target_survei', 'status_survei'];

    public function pertanyaanSurvei()
    {
        return $this->hasMany(PertanyaanSurvei::class, 'id_survei');
    }
}
