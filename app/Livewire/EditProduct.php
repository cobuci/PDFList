<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class EditProduct extends Component
{
    use Actions;
    use WithFileUploads;


    public function render()
    {
        return view('livewire.edit-product');
    }
}
