<?php

namespace App\Livewire\Pkl;

use Livewire\Component;
use App\Models\Pkl;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Industry;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Create extends Component
{
    public $student_id, $teacher_id, $industry_id, $start, $end;
    public $name_student;

    public function mount()
    {
        $userEmail = Auth::user()->email;
        $student = Student::where('email', $userEmail)->first();

        if ($student) {
            $this->student_id = $student->id;
            $this->name_student = $student->name;
        }
    }

    // Fungsi yang akan dipanggil ketika user menekan tombol "Tambahkan"
    public function create()
    {
        $this->validate([
            'student_id'   => 'required|exists:students,id',
            'teacher_id'   => 'required|exists:teachers,id',
            'industry_id'  => 'required|exists:industries,id',
            'start'        => 'required|date',
            'end'          => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $start = Carbon::parse($this->start);
                    $end = Carbon::parse($value);

                    if ($end->lt($start)) {
                        $fail('The finish date must be after or equal to the start date.');
                    } elseif ($start->diffInMonths($end) < 3) {
                        $fail('Minimum PKL duration is 3 months.');
                    }
                }
            ],
        ]);

        DB::beginTransaction();

        try {
            $student = Student::find($this->student_id);

            if (!$student) {
                DB::rollBack();
                session()->flash('error', 'Transaction cancelled: Student not found.');
                return redirect('/dataPkl');
            }

            if ($student->pkl_report_status) {
                DB::rollBack();
                session()->flash('error', 'Student already have PKL data.');
                return redirect('/dataPkl');
            }

            // Simpan data PKL baru
            Pkl::create([
                'student_id'  => $this->student_id,
                'teacher_id'  => $this->teacher_id,
                'industry_id' => $this->industry_id,
                'start'       => $this->start,
                'end'         => $this->end,
            ]);

            DB::commit();
            session()->flash('success', 'PKL data successfully added.');
            return redirect('/dataPkl');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'There is an error: ' . $e->getMessage());
            return redirect('/dataPkl');
        }
    }

    public function render()
    {
        return view('livewire.pkl.create', [
            'pkls'       => Pkl::all(),
            'teachers'   => Teacher::all(),
            'industries' => Industry::all(),
        ]);
    }
}
