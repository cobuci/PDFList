<div class="py-12">
    <x-notifications/>
    <x-dialog/>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white px-6 pb-6 shadow-sm dark:bg-gray-800 sm:rounded-lg">

            <div class="gap-4 py-6">
                <div class="flex flex-wrap justify-between">
                    <x-button primary href="{{ route('dashboard') }}" class="mb-6" icon="backspace">Voltar</x-button>
                    <div class="flex justify-end gap-4">
                        <x-button label="Exportar"
                                  green
                                  href="{{ route('group.export',$group->id ) }}" class="mb-6"
                                  icon="document">
                        </x-button>
                        <x-button label="Apagar Lista"
                                  negative
                                  class="mb-6"
                                  icon="trash"
                                  x-on:confirm="{
                                title: 'Deletar a lista',
                                description: 'Todos os produtos serão excluidos junto com a lista. Deseja continuar?',
                                icon: 'warning',
                                method: 'deleteGroup',
                             }"
                        >
                        </x-button>
                    </div>

                </div>
                <div class="my-4">
                    <div class="flex justify-between">
                        <h1 class="mb-2 text-2xl font-semibold text-gray-900 dark:text-gray-100">Lista
                            #{{ $group->id }}</h1>
                        <livewire:create-product :id="$group->id"/>
                    </div>

                    <p class="text-xl dark:text-white">  {{ $group->name }}</p>
                    <p class="dark:text-white">  {{ $group->description }}</p>
                </div>
                @if($group->products->count() > 0)
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Produtos</h1>

                        <div
                            class="flex mt-6 justify-between px-4 font-bold dark:text-white md:col-span-4 md:col-start-2 ">
                            <div class="hidden md:block">
                                FOTO
                            </div>
                            <div>
                                REFERÊNCIA
                            </div>
                            <div>
                                PREÇO
                            </div>
                        </div>

                        <div class="mt-6 gap-4 rounded-lg ">
                            <ul class="flex flex-col gap-4 w-full"
                                wire:sortable="updateOrder"
                                wire:sortable.options="{ animation: 100 }">
                                @foreach($group->products as $product)
                                    <li class="w-full my-4 justify-between cursor-move"
                                        wire:sortable.item="{{ $product->id }}"
                                        wire:key="task-{{ $product->id }}"
                                        wire:sortable.handle>
                                        <div
                                            wire:click="dialogEdit({{ $product->id }})"
                                            class="border md:col-start-2 md:col-span-4 flex min-w-content min-h-fit justify-between rounded-lg bg-white shadow-lg
                                                    dark:bg-gray-900 dark:text-white">
                                            <div
                                                class="flex items-center justify-center rounded-l-lg bg-red-400 hidden md:block max-w-24">
                                                @if($product->image)
                                                    <img src="{{ asset('storage/' . $product->image) }}"
                                                         alt="{{ $product->name }}" class="h-full w-24 rounded-l-lg">
                                                @else
                                                    <p class="flex h-full w-24 items-center justify-center rounded-l-lg text-white">
                                                        SEM
                                                        FOTO </p>
                                                @endif
                                            </div>
                                            <div class="flex-1 border px-4">
                                                <span class="font-bold">COD.: {{ $product->code }}</span>
                                                <ul class="ml-6 list-disc">
                                                    <li>{{ $product->name }}</li>
                                                    <li>LOTE MÍNIMO: {{ $product->min_amount }}</li>
                                                    <br/>
                                                    <br/>
                                                </ul>
                                                <div class="flex flex-nowrap">
                                                <span
                                                    class="font-bold">VALOR DO SITE R${{ $product->price_site }}</span>
                                                </div>
                                            </div>
                                            <div class="flex flex-nowrap items-center rounded-r-lg border p-2">
                                                <span class="font-bold"> R${{ $product->price_sale }}</span>
                                            </div>
                                        </div>
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

            </div>
        </div>

    </div>

    <x-dialog id="dialogEdit"
              title="Editando o Produto -> {{ $selectedProduct['name'] }}">

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
        <div>
            @if($selectedImage)
                <img src="{{$selectedImage->temporaryUrl() }}" alt="Imagem do produto" class="h-32 w-32">
            @endif
        </div>

        <div class="mt-4 flex gap-4 justify-between">
            <div>
                <x-button negative label="Apagar" wire:click="deleteProduct({{$selectedProduct['id']}})"/>

            </div>
            <div>
                <x-button positive label="Editar" wire:click="updateProduct"/>

            </div>

        </div>
    </x-dialog>
</div>
