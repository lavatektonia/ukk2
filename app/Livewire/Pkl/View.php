<?php

namespace App\Livewire\Pkl;

use Livewire\Component;
use App\Models\Pkl;

class View extends Component
{
    public $pkl;
    public $pklId;

    public function mount($id)
    {
        $this->pklId = $id;
        $this->pkl = Pkl::with(['student', 'teacher', 'industry'])->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.pkl.view', [
            'pkl' => $this->pkl
        ]);
    }
}
