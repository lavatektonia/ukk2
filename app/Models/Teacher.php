<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'nip', 
        'gender', 
        'address', 
        'contact_type', 
        'contact_value', 
        'email'];

    public function pkls()
    {
        return $this->hasMany(Pkl::class); //relasi dengan pkl
    }
}
