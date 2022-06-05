<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogoutComponent extends Component
{
    /**
     * logout
     *
     * @return void
     */
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
    public function render()
    {
        return view('livewire.auth.logout-component');
    }
}
