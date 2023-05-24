<?php

namespace Modules\Administration\Http\Livewire\UserProfile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;


class UserProfile extends Component
{
    use WithFileUploads;

    public $name, $phone_number, $birthdate, $address, $photo;
    public $user;
    public $email, $password;
    public $curent_password, $new_password, $confirm_new_password;


    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone_number = $user->phone_number;
        $this->birthdate = $user->birthdate;
        $this->address = $user->address;
        $this->user=$user;
    }

    public function render()
    {

        return view('administration::livewire.user-profile.user-profile');
    }

    public function updateProfile()
    {
        $data=$this->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'numeric|min:10',
            'birthdate' => 'date',
            'address' => 'string',
        ]);

        $user = Auth::user();
        $user->name = $this->name;
        $user->phone_number = $this->phone_number;
        $user->birthdate = $this->birthdate;
        $user->address = $this->address;

        if ($this->photo) {
            // Eliminar la foto anterior del usuario si existe
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $customName = 'profile'. date('YmdHis');
            $extension = $this->photo->getClientOriginalExtension();
            $path = $this->photo->storeAs('profiles/' . $user->id, $customName . '.' . $extension, 'public');

            $user->photo = $path;
        }

        $user->save();

        // return redirect()->route('profile')->with('success', 'Perfil actualizado correctamente.');

        session()->flash('success', 'Perfil actualizado correctamente.');
        return redirect()->route('profile');
    }

    public function changeEmail()
    {

        $this->validate([
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();

        if($this->password){
            $confirm=Hash::check($this->password, $user->password);

            if ($confirm == false) {
                session()->flash('error_sing_in', 'Contrasena incorrecta');
            }else{
                $user->email = $this->email;
                $user->save();
                session()->flash('success', 'Correo electrónico actualizado correctamente.');
            }
        }else{
            session()->flash('error_sing_in', 'Debe ingresar su contraseña');
        }
        $this->resetInputFields();
    }

    public function changePassword()
    {
        $user = Auth::user();

        if($this->curent_password){

            $confirm=Hash::check($this->curent_password, $user->password);

            if ($confirm == false) {
                session()->flash('error_sing_in', 'Contrasena Actual incorrecta.');
            }else{

                if(!$this->new_password ){
                    session()->flash('error_sing_in', 'Debe ingresar una nueva contraseña.');
                    return;
                }

                if(!$this->confirm_new_password ){
                    session()->flash('error_sing_in', 'Debe ingresar la confirmación de la nueva contraseña.');
                    return;
                }

                if($this->new_password != $this->confirm_new_password){
                    session()->flash('error_sing_in', 'La confirmación de la nueva contraseña no coincide.');
                    return;
                }
                $user->password = Hash::make($this->new_password);
                $user->save();
                session()->flash('success', 'Contraseña actualizada correctamente.');
            }
        }else{
            session()->flash('error_sing_in', 'Debe ingresar contraseña actual.');
        }
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->password=null;
    }


}
