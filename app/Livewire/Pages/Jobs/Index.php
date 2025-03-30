<?php

namespace App\Livewire\Pages\Jobs;

use App\Models\JobPosts;
use Livewire\Component;

class Index extends Component
{
    public array $jobs = [];

    public function mount()
    {
        $this->jobs = JobPosts::all()->toArray();
    }

    public function delete($id) {
        JobPosts::destroy($id);
        session()->flash('success', 'Job post deleted successfully');

        return $this->redirect('/admin/jobs');
    }

    public function render()
    {
        return view('livewire.pages.jobs.index');
    }
}
