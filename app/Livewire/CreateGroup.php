<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Component;
use WireUi\Traits\Actions;

class CreateGroup extends Component
{
    use Actions;

    public $name;
    public $description;

    public function dialogCreate()
    {
        $this->dialog()->id('groupDialog')->confirm([
            'icon' => 'document-report',
            'accept' => [
                'label' => 'Criar',
                'color' => 'positive',
                'method' => 'createGroup',
            ],
            'reject' => [
                'label' => 'Cancelar',
                'color' => 'negative',
            ],
        ]);
    }

    public function createGroup()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        Group::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset();
        $this->notification()->success(
            $title = 'Tabela criada com sucesso!',
            $description = 'A tabela foi criada com sucesso!',
        );
        $this->dispatch('group-created');
    }

    public function render()
    {
        return view('livewire.create-group');
    }
}
