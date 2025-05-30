<?php

namespace App\Livewire\Industry;

use App\Models\Industry;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Create extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $name;
    public $industry_sector;
    public $contact;
    public $email;
    public $website;
    public $address;
    public $picture; 
    protected $updatesQueryString = ['search'];
    protected $paginationTheme = 'tailwind'; 

    protected $rules = [
        'name' => 'required|string|max:255',
        'industry_sector' => 'required|string|max:255',
        'contact' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:255',
        'website' => 'nullable|url|max:255',
        'address' => 'required|string|max:500',
        'picture' => 'nullable|image|max:1024', // 1MB
    ];

    public function store()
    {
        $this->validate();

        $picturePath = $this->picture
            ? $this->picture->store('industries', 'public')
            : null;

        Industry::create([
            'name' => $this->name,
            'industry_sector' => $this->industry_sector,
            'contact' => $this->contact,
            'email' => $this->email,
            'website' => $this->website,
            'address' => $this->address,
            'picture' => $picturePath,
        ]);

        session()->flash('success', 'Industri berhasil ditambahkan.');

        return redirect()->route('industry');
    }

    public function removePicture()
    {
        $this->picture = null;
    }

    public function resetForm()
    {
        $this->reset(['picture', 'name', 'industry_sector', 'website', 'email', 'contact', 'address']);
    }

    public function render()
    {
        return view('livewire.industry.create');
    }
}
