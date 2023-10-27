<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Attributes\On;
use Livewire\Component;

class ListGroups extends Component
{
    public $groups;

    public function showGroup($id)
    {
        return redirect()->route('group.show', $id);
    }

    #[On('group-created')]
    public function mount()
    {
        $this->groups = Group::all();
    }

    public function render()
    {
        return view('livewire.list-groups');
    }
}
