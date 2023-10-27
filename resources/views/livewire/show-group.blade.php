<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white px-6 pb-6 shadow-sm dark:bg-gray-800 sm:rounded-lg">

            <div class="py-6 gap-4">
                <div class="flex justify-between">
                    <x-button primary href="{{ route('dashboard') }}" class="mb-6" icon="backspace">Voltar</x-button>

                    <div class="flex justify-end gap-4">
                        <x-button info class="mb-6" icon="">Editar</x-button>
                        <x-button red class="mb-6" icon="trash">Excluir</x-button>
                    </div>

                </div>
                <div class="my-4">
                    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Lista
                        #{{ $group->id }}</h1>
                    <p class="dark:text-white text-xl">  {{ $group->name }}</p>
                    <p class="dark:text-white">  {{ $group->description }}</p>
                </div>
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Produtos</h1>
                    <div class="grid gap-4 rounded-lg md:grid-cols-4">
                        @foreach($group->products as $product)
                            <div
                                class="flex min-w-fit cursor-pointer justify-between rounded-lg bg-white shadow-lg h-24 dark:bg-gray-900 dark:text-white">
                                <div class="p-2">
                                    <p>{{ $product->name }}</p>
                                    <p>{{ $product->email }}</p>
                                </div>
                                <div
                                    class="flex w-8 min-w-fit items-center justify-center rounded-r-lg bg-gray-600 text-white">
                                    <span> #{{ $product->id }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
