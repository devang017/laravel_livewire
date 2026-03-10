<div>

    <div class="flex items-center justify-between mb-6">
        <div>
            <flux:heading size="xl">Create User</flux:heading>
        </div>
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" wire:navigate>
                Dashboard
            </flux:breadcrumbs.item>

            <flux:breadcrumbs.item href="{{ route('users') }}" wire:navigate>
                Users
            </flux:breadcrumbs.item>

            <flux:breadcrumbs.item>
                Create User
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>


    <div class="max-w-xl">

        <form wire:submit="saveUser" class="space-y-4 mt-6">

            <flux:input label="Name" wire:model="form.name" />

            <flux:input label="Email" type="email" wire:model="form.email" />

            <flux:input label="Password" type="password" wire:model="form.password" />

            <flux:input label="Confirm Password" type="password" wire:model="form.password_confirmation" />

            <div class="flex gap-3">

                <flux:button type="submit" variant="primary">
                    Create User
                </flux:button>

                <flux:button href="{{ route('users') }}" variant="ghost" wire:navigate>
                    Cancel
                </flux:button>

            </div>

        </form>

    </div>

</div>