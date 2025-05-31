<?php

namespace App\Livewire\Pkl;

use Livewire\Component;
use App\Models\Pkl;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Industry;

class Index extends Component
{
    public $search;

    public function render()
    {
        // Ambil data PKL dan cari berdasarkan relasi
        $pklsQuery = Pkl::with(['student', 'teacher', 'industry']);

        if (!empty($this->search)) {
            $pklsQuery->where(function ($query) {
                $query->whereHas('student', function ($q) {
                    $q->where('nis', 'like', '%' . $this->search . '%')
                      ->orWhere('name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('teacher', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('industry', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('bidang_usaha', 'like', '%' . $this->search . '%');
                });
            });
        }

        $pkls = $pklsQuery->get();

        // Ambil semua data student, teacher, industry untuk dropdown (tanpa filter pencarian)
        $students = Student::all();
        $teachers = Teacher::all();
        $industries = Industry::all();

        return view('livewire.pkl.index', [
            'pkls' => $pkls,
            'students' => $students,
            'teachers' => $teachers,
            'industries' => $industries,
        ]);
    }
}


