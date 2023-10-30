<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class ShowGroup extends Component
{

    use Actions;
    use WithFileUploads;

    public $group;

    public array $selectedProduct = [
        'id' => '',
        'name' => 'dfgdfg',
        'code' => '',
        'min_amount' => '',
        'price_sale' => '',
        'price_site' => '',
        'group_id' => '',
    ];

    public $selectedImage;


    public function dialogEdit($id)
    {
        $product = Product::find($id);
        $this->selectedProduct = $product->toArray();
        $this->selectedProduct['price_sale'] = number_format($this->selectedProduct['price_sale'], 2, ',', '');
        $this->selectedProduct['price_site'] = number_format($this->selectedProduct['price_site'], 2, ',', '');


        $this->dialog()->id('dialogEdit')->show([

        ]);

    }

    public function updateProduct()
    {
        if ($this->selectedImage) {
            $this->selectedProduct['image'] = $this->selectedImage->store('products', 'public');
        }
        $this->validate([
            'selectedProduct.name' => 'required',
            'selectedProduct.code' => 'required',
            'selectedProduct.min_amount' => 'required',
            'selectedProduct.price_sale' => 'required',
            'selectedProduct.price_site' => 'required',
        ]);


        $this->selectedProduct['price_sale'] = str_replace(',', '.', $this->selectedProduct['price_sale']);
        $this->selectedProduct['price_site'] = str_replace(',', '.', $this->selectedProduct['price_site']);

        Product::find($this->selectedProduct['id'])->update($this->selectedProduct);

        $this->reset('selectedProduct', 'selectedImage');

        $this->redirectRoute('group.show', ['id' => $this->group->id]);

    }


    public function updateOrder($list)
    {

        foreach ($list as $item) {
            Product::find($item['value'])->update(['position' => $item['order']]);
        }
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        $this->redirectRoute('group.show', ['id' => $this->group->id]);
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
