<div>

    <div class="flex items-center justify-between mb-6">
        <div>
            <flux:heading size="xl">Edit User</flux:heading>
        </div>
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" wire:navigate>
                Dashboard
            </flux:breadcrumbs.item>

            <flux:breadcrumbs.item href="{{ route('roles') }}" wire:navigate>
                Roles
            </flux:breadcrumbs.item>

            <flux:breadcrumbs.item>
                Edit Role
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>


    <div class="max-w-xl">

        <form wire:submit="updateRole" class="space-y-4 mt-6">

            <flux:input label="Name" wire:model="form.name" />

            <div class="flex gap-3">

                <flux:button type="submit" variant="primary">
                    Update User
                </flux:button>

                <flux:button href="{{ route('roles') }}" variant="ghost" wire:navigate>
                    Cancel
                </flux:button>

            </div>

        </form>

    </div>

</div>