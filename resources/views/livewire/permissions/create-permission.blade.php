<div>
    <div class="flex items-center justify-between mb-6">
        <div>
            <flux:heading size="xl">Create Permission</flux:heading>
        </div>
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" wire:navigate>
                Dashboard
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('permissions') }}" wire:navigate>
                Permissions
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                Create Permission
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>


    <div class="max-w-xl">
        <form wire:submit="savePermission" class="space-y-4 mt-6">
            <flux:input label="Name" wire:model="form.name" />
            <div class="flex gap-3">
                <flux:button type="submit" variant="primary">
                    Create Permission
                </flux:button>
                <flux:button href="{{ route('permissions') }}" variant="ghost" wire:navigate>
                    Cancel
                </flux:button>
            </div>
        </form>
    </div>
</div>