<x-app-layout>
    <x-notifications/>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white px-6 pb-6 shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex justify-end py-6 text-gray-900 dark:text-gray-100">
                    <livewire:create-group/>
                </div>
                <livewire:list-groups/>
            </div>
        </div>
    </div>
</x-app-layout>
