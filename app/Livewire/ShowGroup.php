<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowGroup extends Component
{

    public $group;


    public function mount($id)
    {
        $this->group = Group::find($id);
    }

    #[On('product-created')]
    public function render()
    {
        return view('livewire.show-group');
    }
}