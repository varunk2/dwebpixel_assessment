<?php

namespace App\Livewire\Pages\Skills;

use App\Models\Skills;
use Livewire\Component;

class Index extends Component
{
    public $skills;

    public $name = "";

    public $selectedRows = [];
    public $allSelected = false;
    public $editFlag = false;
    public $currentEditing;

    public function mount(Skills $skills) {
        $this->skills = $skills->all();

        $this->fill(
            $skills->only('id', 'name')
        );
    }

    public function updateAllSelected($value) {
        $this->selectedRows = $value ? $this->skills->pluck('id')->toArray() : [];
    }

    public function toggleEditFlag($id) {
        $this->editFlag = true;
        $this->currentEditing = $id;
        $this->name = $this->skills->where('id', $id)->first()->name;
    }

    public function deletedSelectedRows() {
        $rowsCount = count($this->selectedRows);
        Skills::whereIn('id', $this->selectedRows)->delete();
        $this->selectedRows = [];
        session()->flash('success', "$rowsCount rows deleted successfully");
        return $this->redirect('/admin/skills');
    }

    public function save() {
        Skills::create($this->only('name'));

        session()->flash('success', 'New skill added successfully');

        return $this->redirect('/admin/skills');
    }

    public function update() {
        Skills::where('id', $this->currentEditing)
                ->update(['name' => $this->name]);

        session()->flash('success', 'Skill successfully updated');

        return $this->redirect('/admin/skills');
    }

    public function delete($id) {
        $skill = Skills::destroy($id);
        session()->flash('success', 'Skill deleted successfully');

        return $this->redirect('/admin/skills');
    }


    public function render()
    {
        return view('livewire.pages.skills.index');
    }
}
