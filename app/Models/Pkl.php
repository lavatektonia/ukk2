<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Pkl extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'teacher_id',
        'industry_id',
        'start',
        'end',
    ];

    // Relasi ke guru
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // Relasi ke industri
    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    // Relasi ke siswa
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Accessor durasi dalam hari
    public function getDurationAttribute()
    {
        if ($this->start && $this->end) {
            return Carbon::parse($this->start)->diffInDays(Carbon::parse($this->end));
        }

        return null;
    }

    // Validasi durasi minimal 90 hari sebelum menyimpan
    protected static function booted()
    {
        static::saving(function ($pkl) {
            if ($pkl->start && $pkl->end) {
                $duration = Carbon::parse($pkl->start)->diffInDays(Carbon::parse($pkl->end));

                if ($duration < 90) {
                    throw new \Exception('Durasi PKL minimal harus 90 hari.');
                }
            }
        });
    }
}
