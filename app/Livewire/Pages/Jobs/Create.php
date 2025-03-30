<?php

namespace App\Livewire\Pages\Jobs;

use App\Models\JobPosts;
use App\Models\Skills;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $skills;
    public $title = '';
    public $description = '';
    public $experience = '';
    public $salary = '';
    public $location = '';
    public $extra = '';
    public $company_name = '';
    public $company_logo;
    public $selectedSkills;

    protected function rules() {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'experience' => 'required|string|max:20',
            'salary' => 'required|string|min:0|max:30',
            'location' => 'required|string|max:100',
            'extra' => 'nullable|string|max:255',
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,svg|extensions:jpg,jpeg,png,svg', // Max 2MB
            'selectedSkills' => 'required|array|min:1',
            'selectedSkills.*' => 'required|string|max:50'
        ];
    }

    public function mount()
    {
        $this->skills = Skills::all();
    }

    public function submitJob() {
        $validatedData = $this->validate();

        if ($this->company_logo) {
            $filePath = $this->company_logo->store(path: 'public/uploads');
            $validated['company_logo'] = str_replace('public/', '', $filePath);
        }

        if ($this->selectedSkills) {
            $validatedData['skills'] = implode(",", $this->selectedSkills);
        }

        JobPosts::create($validatedData);

        session()->flash('success', 'Job posted successfully!!');
        $this->reset();
        return $this->redirect('/admin/jobs/create');
    }

    public function render()
    {
        return view('livewire.pages.jobs.create');
    }
}
