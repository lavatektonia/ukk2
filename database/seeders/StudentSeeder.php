<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $siswa = Student::insert([
            [
                'name' => "Akbar Ad'ha Kusumawardhana", 
                'nis' => '20394',
                'gender' => 'Male',
                'address' => 'Sleman',
                'contact' => '089514958932',
                'email' => 'akbar@gmail.com',
                'pkl_report_status'=> false,
            ],
            [
                'name' => 'Mutiara Sekar Kinasih', 
                'nis' => '20431',
                'gender' => 'Female',
                'address' => 'Bantul',
                'contact' => '085198553807',
                'email' => 'mtiaraskinasih@gmail.com',
                'pkl_report_status'=> false,
            ],
            [
                'name' => 'Kaysa Aqila Amta', 
                'nis' => '20419',
                'gender' => 'Female',
                'address' => 'Turi',
                'contact' => '085741571381',
                'email' => 'kaysaql@gmail.com',
                'pkl_report_status'=> false,
            ],
            [
                'name' => 'Angelina Thithis Sekar Langit', 
                'nis' => '20396',
                'gender' => 'Female',
                'address' => 'Prambanan',
                'contact' => '081272353535',
                'email' => 'arrowofdarkness2@gmail.com',
                'pkl_report_status'=> false,
            ],
            [
                'name' => 'Marcellinus Christo Pradipta', 
                'nis' => '20422',
                'gender' => 'Male',
                'address' => 'Sleman',
                'contact' => '089688361696',
                'email' => 'marchllinuschristo11@gmail.com',
                'pkl_report_status'=> false,
            ],
            [
                'name' => 'Naufelirna Subkhi Ramadhani', 
                'nis' => '20454',
                'gender' => 'Female',
                'address' => 'Klaten',
                'contact' => '089671421234',
                'email' => 'adzanaufel705@gmail.com',
                'pkl_report_status'=> false,
            ],
            [
                'name' => 'Rosyidah Muuthmainnah', 
                'nis' => '20448',
                'gender' => 'Female',
                'address' => 'Sleman',
                'contact' => '087883538770',
                'email' => 'rosyi.html@gmail.com',
                'pkl_report_status'=> false,
            ],
            [
                'name' => 'Gabriel Possenti Genta Bahana Nagari', 
                'nis' => '20410',
                'gender' => 'Male',
                'address' => 'Sleman',
                'contact' => '089634085990',
                'email' => 'gentapossenti@gmail.com',
                'pkl_report_status'=> false,
            ],
            [
                'name' => 'Meidinna Tiara Pramudhita', 
                'nis' => '20423',
                'gender' => 'Female',
                'address' => 'Prujakan',
                'contact' => '083121895462',
                'email' => 'meidinna@gmail.com',
                'pkl_report_status'=> false,
            ],
            [
                'name' => 'Farcha Amalia Nugrahaini', 
                'nis' => '20408',
                'gender' => 'Female',
                'address' => 'Sleman',
                'contact' => '0895380761274',
                'email' => 'farchaamalia@gmail.com',
                'pkl_report_status'=> false,
            ],
        ]);
    }
}