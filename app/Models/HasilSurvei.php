<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilSurvei extends Model
{
    use HasFactory;
    protected $table = 'hasil_survei';
    protected $fillable = ['id_user', 'id_survei'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function survei()
    {
        return $this->belongsTo(Survei::class, 'id_survei');
    }
}
