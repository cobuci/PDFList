<div>
    <div class="grid gap-4 rounded-lg md:grid-cols-4">
        @foreach($groups as $group)
            <div
                wire:click="showGroup({{ $group->id }})"
                class="flex h-24 min-w-fit cursor-pointer justify-between rounded-lg bg-white shadow-lg dark:bg-gray-900 dark:text-white">
                <div class="p-2">
                    <p>{{ $group->name }}</p>
                    <p>{{ $group->description }}</p>
                </div>
                <div
                    class="flex w-8 min-w-fit items-center justify-center rounded-r-lg bg-gray-600 text-white">
                    <span> #{{ $group->id }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>


