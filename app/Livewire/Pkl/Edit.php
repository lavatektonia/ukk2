<?php

namespace App\Livewire\Pkl;

use Livewire\Component;
use App\Models\Pkl;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Industry;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    public $pklId;
    public $student_id, $teacher_id, $industry_id;
    public $start, $end;

    public function mount($id)
    {
        $this->pklId = $id;

        $pkl = Pkl::findOrFail($id);
        $this->student_id = $pkl->student_id;
        $this->teacher_id = $pkl->teacher_id;
        $this->industry_id = $pkl->industry_id;
        $this->start = $pkl->start;
        $this->end = $pkl->end;
    }

    public function update()
    {
        $this->validate([
            'student_id'   => 'required|exists:students,id',
            'teacher_id'   => 'required|exists:teachers,id',
            'industry_id'  => 'required|exists:industries,id',
            'start'        => 'required|date',
            'end'          => 'required|date',
        ]);

        $studentRegistered = Pkl::where('student_id', $this->student_id)
            ->where('id', '!=', $this->pklId)
            ->exists();

        if ($studentRegistered) {
            session()->flash('error', 'This student has registered for PKL');
            return;
        }

        $pkl = Pkl::findOrFail($this->pklId);

        $pkl->update([
            'student_id'   => $this->student_id,
            'teacher_id'   => $this->teacher_id,
            'industry_id'  => $this->industry_id,
            'start'        => $this->start,
            'end'          => $this->end,
        ]);

        session()->flash('success', 'PKL data successfully updated');
        return redirect('/dataPkl');
    }

    public function render()
    {
        $pkl = Pkl::with('student')->findOrFail($this->pklId);

        return view('livewire.pkl.edit', [
            'pkl'        => $pkl,
            'students'   => Student::all(),     // optional, bisa dihapus jika tidak dipakai di blade
            'teachers'   => Teacher::all(),
            'industries' => Industry::all(),
        ]);
    }
}
