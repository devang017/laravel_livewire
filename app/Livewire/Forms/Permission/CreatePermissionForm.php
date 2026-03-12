<?php

namespace App\Livewire\Forms\Permission;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreatePermissionForm extends Form
{
    #[Validate('required|min:3|max:50|unique:permissions,name')]
    public string $name;
}
