<?php

namespace App\Livewire\Industry;

use Livewire\Component;
use App\Models\Industry;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    protected $updatesQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage(); // reset ke halaman 1 saat search berubah
    }

    public function render()
    {
        $industries = Industry::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('industry_sector', 'like', '%' . $this->search . '%')
                    ->orWhere('contact', 'like', '%' . $this->search . '%');
            })
            ->paginate(10); // gunakan paginate

        return view('livewire.industry.index', [
            'industries' => $industries,
        ]);
    }
}
