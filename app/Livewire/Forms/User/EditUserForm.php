<?php

namespace App\Livewire\Forms\User;

use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Livewire\Form;

class EditUserForm extends Form
{
    public ?int $userId = null;

    #[Validate('required|min:3')]
    public string $name;

    public string $email = '';

    #[Validate('nullable|min:6|max:100|confirmed')]
    public string $password;

    public $password_confirmation = '';

    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->userId),
            ],
        ];
    }
}
