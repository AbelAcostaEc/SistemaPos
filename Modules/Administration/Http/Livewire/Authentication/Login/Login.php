<?php

namespace Modules\Administration\Http\Livewire\Authentication\Login;

use App\Models\User;

use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('administration::livewire.authentication.login.login');
    }

    public function login()
    {
        /* $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]); */

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (auth()->attempt($credentials)) {


            return redirect()->intended('administration/dashboard');
        } else {
            return back()->withInput()->with('error', 'El usuario o su contraseña son incorrectos!');
        }
    }
}
