<div>
    <x-button info label="Produto" icon="plus" wire:click="dialogCreate"/>

    <x-dialog id="productDialog" title="Adicionar Produto">
        <x-input label="Nome do Produto" placeholder="Insira o nome do produto" wire:model="product.name"/>
        <x-input label="Código Produto" placeholder="Insira o código do produto" wire:model="product.code"/>
        <x-inputs.currency label="Preço" placeholder="Insira o preço de venda" prefix="R$" thousands="." decimal=","
                           wire:model="product.price_sale"/>
        <x-inputs.currency label="Preço site" placeholder="Insira o preço do site" prefix="R$" thousands="." decimal=","
                           wire:model="product.price_site"/>
        <x-input label="Lote minimo" placeholder="Insira o lote minimo" wire:model="product.min_amount"/>
        <x-input type="file" accept="image/png, image/jpeg" label="Foto produto" wire:model="image"/>
        @if($image)
            <img src="{{$image->temporaryUrl() }}" alt="Imagem do produto" class="h-32 w-32">
        @endif
        <div class="mt-4 flex justify-end">
            <x-button positive label="Adicionar" wire:click="createProduct"/>
        </div>


    </x-dialog>
</div>
