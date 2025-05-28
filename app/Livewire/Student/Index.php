<?php

namespace App\Livewire\Student;

use Livewire\Component;
use App\Models\Student;

class Index extends Component
{
    public $search = '';
    public $selected_class_group = '';
    public $selected_gender = '';

    public $genders = [
        'Male' => 'Male',
        'Female' => 'Female',
    ];

    public $class_groups = [
        'SIJA A' => 'SIJA A',
        'SIJA B' => 'SIJA B',
    ];

    public function render()
    {
        $students = Student::query();

        if (!empty(trim($this->search))) {
            $students->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('nis', 'like', '%' . $this->search . '%')
                      ->orWhere('address', 'like', '%' . $this->search . '%')
                      ->orWhere('contact', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        if (!empty(trim($this->selected_gender))) {
            $students->where('gender', $this->selected_gender);
        }

        if (!empty(trim($this->selected_class_group))) {
            $students->where('class_group', $this->selected_class_group);
        }

        $students = $students->get();

        return view('livewire.student.index', [
            'students' => $students,
            'genders' => $this->genders,
            'class_groups' => $this->class_groups,
        ]);
    }
}
