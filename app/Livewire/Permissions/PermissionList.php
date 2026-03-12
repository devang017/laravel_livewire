<?php

namespace App\Livewire\Permissions;


use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermissionList extends Component
{
    use WithPagination;

    // index pages
    public string $search = '';
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function sort(string $field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function deletePermission(int $id): void
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        session()->flash('success', 'Permission deleted successfully.');
    }

    public function render()
    {
        $permissions = Permission::query()->when(
            $this->search,
            fn($q) =>
            $q->where('name', 'like', "%{$this->search}%")
        )
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.permissions.permission-list', compact('permissions'));
    }
}
