<?php

namespace App\Livewire\Student;

use Livewire\Component;
use App\Models\Student;

class Index extends Component
{
    public $search = '';

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

        return view('livewire.student.index', [
            'students' => $students->get(),
        ]);
    }
}
