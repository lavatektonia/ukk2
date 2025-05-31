<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = Teacher::insert([
            [
                'name' => 'Sugiarto, ST', 
                'nip' => '197203172005011012',
                'gender' => 'M',
                'address' => 'Klaten',
                'contact_value' => '@mrantazy68',
                'email' => 'mrantazy68@gmail.com'
            ],
            [
                'name' => 'Yunianto Hermawan, S.Kom', 
                'nip' => '197306202006041005',
                'gender' => 'M',
                'address' => 'Klaten',
                'contact_value' => '081548734649',
                'email' => 'yuniantohermawan@gmail.com'
            ],
            [
                'name' => 'Eka Nur Ahmad Romadhoni, S.Pd.', 
                'nip' => '199303012019031011',
                'gender' => 'M',
                'address' => 'Klaten',
                'contact_value' => '085895780078',
                'email' => 'eka.html@gmail.com'
            ],
            [
                'name' => 'M. Endah Titisari, ST', 
                'nip' => '197403022006042008',
                'gender' => 'F',
                'address' => 'Pokoh, Maguwo',
                'contact_value' => '085608990027',
                'email' => 'mareta.susend@gmail.com'
            ],
            [
                'name' => 'Rr. Retna Trimantaraningsih, ST', 
                'nip' => '197006272021212002',
                'gender' => 'F',
                'address' => 'Denggung',
                'contact_value' => '0856436402427',
                'email' => 'rereningsihlarose@gmail.com'
            ],
            [
                'name' => 'Ratna Yunita Sari, ST', 
                'nip' => '197107082022211003',
                'gender' => 'F',
                'address' => 'Gendeng Kidul',
                'contact_value' => '085228771506',
                'email' => 'ratnayu2014@gmail.com'
            ],
        ]);
    }
}