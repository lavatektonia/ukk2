<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pkl extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 
        'teacher_id', 
        'industry_id', 
        'start', 
        'end'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class); //relasi dengan guru
    }
    
    public function industry()
    {
        return $this->belongsTo(Industry::class); //relasi dengan industri
    }
    
    public function student()
    {
        return $this->belongsTo(Student::class); //relasi dengan siswa
    }
}
