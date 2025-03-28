<?php

namespace App\Livewire\Pages\Jobs;

use App\Models\Skills;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Create extends Component
{
    use WithFileUploads;

    #[Validate('image|max:1024')]
    public $photo;

    public $skills;
    public $title = '';
    public $description = '';
    public $experience = '';
    public $salary = '';
    public $location = '';
    public $extra = '';
    public $company_name = '';
    public $company_logo = '';
    public $selectedSkills = [];

    public function mount()
    {
        $this->skills = Skills::all();
    }
    public function render()
    {
        return view('livewire.pages.jobs.create');
    }
}
