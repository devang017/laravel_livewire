<?php

namespace App\Livewire\Forms\Role;

use Livewire\Form;

class EditRoleForm extends Form
{
    public ?int $roleId = null;

    public string $name = '';

    public $permissions = [];

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50|unique:roles,name,' . $this->roleId,
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,name',
        ];
    }
}
