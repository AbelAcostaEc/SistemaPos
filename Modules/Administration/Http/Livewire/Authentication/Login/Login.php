<?php

namespace Modules\Administration\Http\Livewire\Authentication\Login;

//Library
use Livewire\Component;

class Login extends Component
{
    public $email, $password;

    public function render()
    {
        return view('administration::livewire.authentication.login.login');
    }

    public function login()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];
        //Verifica la autenticación
        if (auth()->attempt($credentials)) 
        {
            return redirect()->intended('administration/dashboard');
        } else {
            return back()->withInput()->with('error', 'El usuario o su contraseña son incorrectos!');
        }
    }
}
