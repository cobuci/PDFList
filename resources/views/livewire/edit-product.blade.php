<div>
    {{--    <x-button info label="Editar Produto" icon="plus" wire:click="dialogEdit"/>--}}
    <x-dialog/>
    <x-dialog id="dialogEdit" title="Editando Produto a lista {{ $product['group_id'] }}">
        <x-input label="Nome do Produto" placeholder="Insira o nome do produto" wire:model="selectedProduct.name"/>
        <x-input label="Código Produto" placeholder="Insira o código do produto" wire:model="selectedProduct.code"/>
        <x-inputs.currency label="Preço" placeholder="Insira o preço de venda" prefix="R$" thousands="." decimal=","
                           wire:model="selectedProduct.price_sale"/>
        <x-inputs.currency label="Preço site" placeholder="Insira o preço do site" prefix="R$"
                           thousands="." decimal=","
                           wire:model="selectedProduct.price_site"/>

        <x-inputs.number label="Lote minimo" placeholder="Insira o lote minimo"
                         wire:model="selectedProduct.min_amount"/>
        <x-input type="file" accept="image/png, image/jpeg" label="Foto produto" wire:model="selectedImage"/>
        @if($selectedImage)
            <img src="{{$selectedImage->temporaryUrl() }}" alt="Imagem do produto" class="h-32 w-32">
        @endif
        <div class="mt-4 flex justify-end">
            <x-button positive label="Editar" wire:click="updateProduct"/>

        </div>
    </x-dialog>
</div>
