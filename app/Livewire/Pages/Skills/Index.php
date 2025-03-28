<?php

namespace App\Livewire\Pages\Skills;

use Livewire\Component;

class Index extends Component
{
    public array $skills = [];

    public function render()
    {
        return view('livewire.pages.skills.index');
    }
}
