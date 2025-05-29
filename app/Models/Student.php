<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'nis', 
        'gender', 
        'class_group', 
        'address', 
        'contact', 
        'email', 
        'pkl_report_status'];

    public function pkls()
    {
        return $this->hasMany(Pkl::class); //relasi dengan pkl
    }
}
