<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraCurricularStudent extends Model
{
    use HasFactory;

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function extracurricular()
    {
        return $this->belongsTo(Extracurricular::class);
    }

}
