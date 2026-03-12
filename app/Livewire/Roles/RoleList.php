<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleList extends Component
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

    public function deleteRole(int $id): void
    {
        $role = Role::findOrFail($id);
        $role->users()->detach();
        $role->permissions()->detach();
        $role->delete();
        session()->flash('success', 'Role deleted successfully.');
    }

    public function render()
    {
        $roles = Role::query()->with('permissions:id,name')->when(
            $this->search,
            fn($q) =>
            $q->where('name', 'like', "%{$this->search}%")
        )
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.roles.role-list', compact('roles'));
    }
}
