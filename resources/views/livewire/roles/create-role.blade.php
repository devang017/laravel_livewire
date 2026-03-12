<div>

    <div class="flex items-center justify-between mb-6">
        <div>
            <flux:heading size="xl">Create Role</flux:heading>
        </div>

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" wire:navigate>
                Dashboard
            </flux:breadcrumbs.item>

            <flux:breadcrumbs.item href="{{ route('roles') }}" wire:navigate>
                Roles
            </flux:breadcrumbs.item>

            <flux:breadcrumbs.item>
                Create Role
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="max-w-xl">

        <form wire:submit="saveRole" class="space-y-6 mt-6">

            <flux:input label="Role Name" placeholder="Enter role name" wire:model="form.name" />

            <flux:field>
                <flux:label>Permissions</flux:label>

                <flux:dropdown position="bottom start">

                    <flux:button icon-trailing="chevron-down" class="w-full justify-between">
                        Select Permissions
                    </flux:button>

                    <flux:menu class="w-64 max-h-60 overflow-y-auto">

                        @foreach($permissions as $permission)

                        <flux:menu.item as="div">
                            <label class="flex items-center gap-2 cursor-pointer" onclick="event.stopPropagation()">

                                <input type="checkbox" value="{{ $permission->name }}" wire:model="selectedPermissions">

                                {{ $permission->name }}

                            </label>
                        </flux:menu.item>

                        @endforeach

                    </flux:menu>

                </flux:dropdown>

                <flux:error name="form.permissions" />

            </flux:field>

            <div class="flex gap-3">

                <flux:button type="submit" variant="primary">
                    Create Role
                </flux:button>

                <flux:button href="{{ route('roles') }}" variant="ghost" wire:navigate>
                    Cancel
                </flux:button>

            </div>

        </form>

    </div>

</div>