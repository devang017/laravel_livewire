<?php

namespace App\Livewire\Forms\User;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateUserForm extends Form
{
    #[Validate('required|min:3')]
    public string $name;

    #[Validate('required|email|unique:users,email')]
    public string $email;

    #[Validate('required|array')]
    public array $roles = [];

    #[Validate('exists:roles,name')]
    public array $rolesItems = [];

    #[Validate('required|min:6|max:100|confirmed')]
    public string $password;

    public $password_confirmation = '';
}
