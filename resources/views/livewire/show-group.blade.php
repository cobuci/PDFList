<div class="py-12">
    <x-notifications/>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white px-6 pb-6 shadow-sm dark:bg-gray-800 sm:rounded-lg">

            <div class="gap-4 py-6">
                <div class="flex justify-between">
                    <x-button primary href="{{ route('dashboard') }}" class="mb-6" icon="backspace">Voltar</x-button>
                    <div class="flex justify-end gap-4">
                        <x-button red class="mb-6" icon="trash">Excluir</x-button>
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
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Produtos</h1>
                    <div class="mt-6 grid w-full items-center gap-4 rounded-lg md:grid-cols-6">
                        <div class="flex justify-between px-4 font-bold dark:text-white md:col-span-4 md:col-start-2">
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
                        @foreach($group->products as $product)
                            <div
                                class="border md:col-start-2 md:col-span-4 flex min-h-fit cursor-pointer justify-between rounded-lg bg-white shadow-lg
                         dark:bg-gray-900 dark:text-white">
                                <div class="flex items-center justify-center rounded-l-lg bg-red-600 max-w-16">
                                    <img src="{{ $product->image }}" alt="Imagem do produto" class="h-16 w-16">
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
                                        <span class="font-bold">VALOR DO SITE R${{ $product->price_site }}</span>
                                    </div>
                                </div>
                                <div class="flex flex-nowrap items-center rounded-r-lg border p-2">
                                    <span class="font-bold"> R${{ $product->price_sale }}</span>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
