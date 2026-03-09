<div>
    <div class="flex items-center justify-between mb-6">
        <div>
            <flux:heading size="xl">Users</flux:heading>
            <flux:subheading>Manage your application users.</flux:subheading>
        </div>
        <flux:button href="" variant="primary" icon="plus" wire:navigate>
            Add User
        </flux:button>
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

    <div class="mb-4 max-w-sm">
        <flux:input wire:model.live.debounce.300ms="search" placeholder="Search by name or email..." icon="magnifying-glass" />
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
                        <button wire:click="sort('email')" class="flex items-center gap-1 hover:text-zinc-900 dark:hover:text-white transition-colors">
                            Email
                            <span class="text-xs">
                                @if($sortField === 'email')
                                {{ $sortDirection === 'asc' ? '↑' : '↓' }}
                                @else
                                <span class="opacity-40">↕</span>
                                @endif
                            </span>
                        </button>
                    </th>
                    <th class="px-4 py-3 text-left font-medium text-zinc-500 dark:text-zinc-400">
                        <button wire:click="sort('created_at')" class="flex items-center gap-1 hover:text-zinc-900 dark:hover:text-white transition-colors">
                            Joined
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
                @forelse ($users as $user)
                <tr wire:key="{{ $user->id }}" class="bg-white dark:bg-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-700/50 transition-colors">
                    <td class="px-4 py-3 font-medium text-zinc-900 dark:text-white">
                        {{ $user->name }}
                    </td>
                    <td class="px-4 py-3 text-zinc-500 dark:text-zinc-400">
                        {{ $user->email }}
                    </td>
                    <td class="px-4 py-3 text-zinc-500 dark:text-zinc-400">
                        {{ $user->created_at->format('d M Y') }}
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center justify-end gap-2">
                            <flux:button href="" variant="ghost" size="sm" icon="pencil" wire:navigate>
                                Edit
                            </flux:button>
                            <flux:button wire:click="" wire:confirm="Are you sure you want to delete {{ $user->name }}?" variant="danger" size="sm" icon="trash">
                                Delete
                            </flux:button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-12 text-center text-zinc-400">
                        <p class="text-lg font-medium">No users found</p>
                        <p class="text-sm mt-1">Try adjusting your search or add a new user.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>