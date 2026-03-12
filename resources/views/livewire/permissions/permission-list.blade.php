<div>
    <div class="flex items-center justify-between mb-6">
        <div>
            <flux:heading size="xl">Permissions</flux:heading>
        </div>
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" wire:navigate>
                Dashboard
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                Permissions
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    @if (session('success'))
    <flux:callout variant="success" icon="check-circle" class="mb-4">
        <flux:callout.heading>{{ session('success') }}</flux:callout.heading>
    </flux:callout>
    @endif

    @if (session('error'))
    <flux:callout variant="danger" icon="x-circle" class="mb-4">
        <flux:callout.heading>{{ session('error') }}</flux:callout.heading>
    </flux:callout>
    @endif

    <div class="flex items-center justify-between mb-6">
        <div class="flex-1 max-w-lg">
            <flux:input wire:model.live.debounce.300ms="search" placeholder="Search by name..." icon="magnifying-glass" />
        </div>
        <flux:button href="{{ route('permissions.create') }}" variant="primary" icon="plus" wire:navigate>
            Add Permissions
        </flux:button>
    </div>

    <div class="overflow-x-auto rounded-lg border border-zinc-200 dark:border-zinc-700">
        <table class="w-full text-sm">
            <thead class="border-b border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-900">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-zinc-500 dark:text-zinc-400">
                        <button wire:click="sort('name')" class="flex items-center gap-1 hover:text-zinc-900 dark:hover:text-white transition-colors">
                            Name
                            <span class="text-xs">
                                @if($sortField === 'name')
                                {{ $sortDirection === 'asc' ? '↑' : '↓' }}
                                @else
                                <span class="opacity-40">↕</span>
                                @endif
                            </span>
                        </button>
                    </th>
                    <th class="px-4 py-3 text-left font-medium text-zinc-500 dark:text-zinc-400">
                        <span class="text-xs">
                            Roles
                        </span>
                    </th>
                    <th class="px-4 py-3 text-left font-medium text-zinc-500 dark:text-zinc-400">
                        <button wire:click="sort('created_at')" class="flex items-center gap-1 hover:text-zinc-900 dark:hover:text-white transition-colors">
                            Created Date
                            <span class="text-xs">
                                @if($sortField === 'created_at')
                                {{ $sortDirection === 'asc' ? '↑' : '↓' }}
                                @else
                                <span class="opacity-40">↕</span>
                                @endif
                            </span>
                        </button>
                    </th>
                    <th class="px-4 py-3 text-right font-medium text-zinc-500 dark:text-zinc-400">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                @forelse ($permissions as $permission)
                <tr wire:key="{{ $permission->id }}" class="bg-white dark:bg-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-700/50 transition-colors">
                    <td class="px-4 py-3 font-medium text-zinc-900 dark:text-white">
                        {{ $permission->name }}
                    </td>
                    <td class="px-4 py-3 font-medium text-zinc-900 dark:text-white">
                        {{ $permission->roles->pluck('name')?->implode(', ') }}
                    </td>
                    <td class="px-4 py-3 font-medium text-zinc-900 dark:text-white">
                        {{ $permission->created_at?->format('d M Y') }}
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center justify-end gap-2">
                            <flux:button href="{{ route('permissions.edit', $permission->id) }}" variant="ghost" size="sm" icon="pencil" wire:navigate>
                                Edit
                            </flux:button>
                            <flux:button wire:click="deletePermission({{ $permission->id }})" wire:confirm="Are you sure you want to delete {{ $permission->name }} Permission?" variant="danger" size="sm" icon="trash">
                                Delete
                            </flux:button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-12 text-center text-zinc-400">
                        <p class="text-lg font-medium">No Permissions found</p>
                        <p class="text-sm mt-1">Try adjusting your search or add a new permission.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $permissions->links() }}
    </div>
</div>