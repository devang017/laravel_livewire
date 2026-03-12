<?php

namespace App\Livewire\Forms\Role;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateRoleForm extends Form
{
    #[Validate('required|min:3|max:50|unique:roles,name')]
    public string $name;

    #[Validate('required|array')]
    public array $permissions = [];

    #[Validate('exists:permissions,name')]
    public array $permissionsItems = [];
}
