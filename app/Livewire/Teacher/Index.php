<?php

namespace App\Livewire\Teacher;

use Livewire\Component;
use App\Models\Teacher;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    //spy saat search ga reload halaman, stay di halaman itu
    protected $updatesQueryString = ['search'];
    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage(); // reset ke halaman 1 saat search berubah
    }

    public function render()
    {
        $teachers = Teacher::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('nip', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%')
                    ->orWhere('contact_value', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->paginate(10); 

            $genders = [
            'M' => 'Male',
            'F' => 'Female',
        ];

        return view('livewire.teacher.index', [
            'teachers' => $teachers,
            'genders' => $genders,
        ]);
    }
}
