<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class CreateProduct extends Component
{

    use Actions;
    use WithFileUploads;

    public $product = [
        'name' => '',
        'description' => '',
        'code' => '',
        'min_amount' => '',
        'price_sale' => '',
        'price_site' => '',
        'group_id' => '',
    ];

    public $image;

    public $product_image;

    public function dialogCreate()
    {
        $this->dialog()->id('productDialog')->show([
        ]);
    }


    public function mount($id)
    {
        $this->product['group_id'] = $id;
    }

    public function createProduct()
    {
        if ($this->image) {
            $this->product['image'] = $this->image->store('products', 'public');
        }
        $this->validate([
            'product.name' => 'required',
            'product.code' => 'required',
            'product.min_amount' => 'required',
            'product.price_sale' => 'required',
            'product.price_site' => 'required',
        ]);


        Product::create($this->product);


        $this->reset('product.name', 'product.code', 'product.min_amount', 'product.price_sale', 'product.price_site', 'image', 'product.image');

        $this->notification()->success(
            $title = 'Produto criado com sucesso!',
            $description = 'O produto foi criado com sucesso!',
        );
        $this->dispatch('product-created');

    }


    public function render()
    {
        return view('livewire.create-product');
    }
}
