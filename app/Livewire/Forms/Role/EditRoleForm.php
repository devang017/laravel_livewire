<?php

namespace App\Livewire\Forms\Role;

use Illuminate\Validation\Rule;
use Livewire\Form;

class EditRoleForm extends Form
{
    public ?int $roleId = null;

    public string $name = '';

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('roles', 'name')->ignore($this->roleId),
            ],
        ];
    }
}
