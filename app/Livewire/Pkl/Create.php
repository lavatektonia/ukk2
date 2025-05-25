<?php

namespace App\Livewire\Pkl;

use Livewire\Component;
use App\Models\Pkl;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Industry;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $student_id, $teacher_id, $industry_id, $start, $end;

    // Fungsi yang akan dipanggil ketika user menekan tombol Tambahkan
    public function create()
    {
        $this->validate([
            'student_id' => 'required|exists:students,id',
            'teacher_id' => 'required|exists:teachers,id',
            'industry_id' => 'required|exists:industries,id',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
        ]);

        DB::beginTransaction();

        try {
            $student = Student::find($this->student_id);

            if (!$student) {
                DB::rollBack();
                session()->flash('error', 'Transaksi dibatalkan: Student not found.');
                return redirect('/dataPkl');
            }

            if ($student->pkl_report_status) {
                DB::rollBack();
                session()->flash('error', 'Students already have PKL data.');
                return redirect('/dataPkl');
            }

            // Simpan data PKL baru ke database
            Pkl::create([
                'student_id' => $this->student_id,
                'teacher_id' => $this->teacher_id,
                'industry_id' => $this->industry_id,
                'start' => $this->start,
                'end' => $this->end,
            ]);

            // Simpan transaksi secara permanen ke database
            DB::commit();
            session()->flash('success', 'PKL data successfully added.');
            return redirect('/dataPkl');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'There is an error:' . $e->getMessage());
            return;
        }
    }

    public function render()
    {
        // Ambil semua data siswa, guru, industri untuk dropdown
        $pkls = Pkl::all();
        $students = Student::all();
        $teachers = Teacher::all();
        $industries = Industry::all();

        return view('livewire.pkl.create', [
        'pkls' => $pkls,
        'students' => $students,
        'teachers' => $teachers,
        'industries' => $industries,
        ]);
    }
}
