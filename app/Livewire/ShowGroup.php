<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Attributes\On;
use Livewire\Component;
use WireUi\Traits\Actions;

class ShowGroup extends Component
{

    use Actions;

    public $group;


    public function deleteGroup()
    {
        $this->group->delete();

        return redirect()->route('dashboard');
    }

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
