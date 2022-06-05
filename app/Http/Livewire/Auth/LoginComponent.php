<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginComponent extends Component
{
    public $email;
    public $password;

    public function autheticate(){
        $formData = $this->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($formData)){
            return redirect()->route('admin.home');
        }
        $this->addError('email','The credentail does not match with our records');

    }
    public function render()
    {
        return view('livewire.auth.login-component')
        ->layout('layouts.admin-app');
    }
}
