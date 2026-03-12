<?php

namespace App\Livewire\Forms\Permission;

use Illuminate\Validation\Rule;
use Livewire\Form;

class EditPermissionForm extends Form
{
    public ?int $permissionId = null;

    public string $name = '';

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('permissions', 'name')->ignore($this->permissionId),
            ],
        ];
    }
}
