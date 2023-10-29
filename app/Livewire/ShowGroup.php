<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;
use WireUi\Traits\Actions;

class ShowGroup extends Component
{

    use Actions;

    public $group;


    public function updateOrder($list)
    {
        foreach ($list as $item) {
            Product::find($item['value'])->update(['position' => $item['order']]);
        }
    }

    public function dialogDeleteProduct($id)
    {
        $this->dialog()->confirm([
            'title' => 'Delete product',
            'description' => "Você tem certeza que deseja excluir o produto da lista de compras?",
            'accept' => [
                'label' => 'Yes, save it',
                'method' => 'delete',
                'params' => $id,
            ],
            'reject' => [
                'label' => 'No, cancel',
                'method' => 'cancel',
            ],
        ]);
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

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
        return view('livewire.show-group',);
    }
}
