<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'nisn',
        'address',
        'gender',
        'photo',
    ];

    public function extracurriculars()
    {
        return $this->hasMany(StudentExtracurricular::class);
    }
}
