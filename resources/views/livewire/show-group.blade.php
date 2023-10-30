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
                            class="mt-6 grid w-full gap-4 rounded-lg md:grid-cols-6">
                            <div
                                class="flex justify-between px-4 font-bold dark:text-white md:col-span-4 md:col-start-2 ">
                                <div>
                                    FOTO
                                </div>
                                <div>
                                    REFERÊNCIA
                                </div>
                                <div>
                                    PREÇO
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 gap-4 rounded-lg ">
                            <ul class="flex flex-col gap-4 w-full"
                                wire:sortable="updateOrder"
                                wire:sortable.options="{ animation: 100 }">
                                @foreach($group->products as $product)
                                    <li class="w-full my-4 justify-between"
                                        wire:sortable.item="{{ $product->id }}"
                                        wire:key="task-{{ $product->id }}" wire:sortable.handle>
                                        <div
                                            x-on:confirm="{
                                                        title: 'Apagar o produto da lista',
                                                        description: 'O Produto será removido. Deseja continuar?',
                                                        icon: 'warning',
                                                        method: 'deleteProduct',
                                                        params: {{ $product->id }}
                                                    }"
                                            class="border md:col-start-2 md:col-span-4 flex min-w-content min-h-fit cursor-pointer justify-between rounded-lg bg-white shadow-lg
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

</div>
