<?php

namespace Modules\Administration\Http\Livewire\User;

//Library
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

//Models
use App\Models\User as UserModel;
use Modules\Administration\Entities\Role as RoleModel;

//Traits
use App\Traits\AuthorizesRoleOrPermission;

class User extends Component
{
    use WithPagination;
    use AuthorizesRoleOrPermission;

    public $search;
    public $name, $email, $password, $user_id, $role;
    public $deleteMode = false, $paginate = 5;
    public $messages; // variable mensajes de error de validación

    public function mount()
    {
        //Establece mensaje de error personalizados
        $this->messages = [
            'required' => 'El campo :attribute es obligatorio.',
            'email' => 'El campo :attribute debe ser un correo electrónico válido.',
            'unique' => 'El :attribute ya está en uso.',
            'min' => 'Elija por lo menos un :attribute'
        ];
    }

    public function render()
    {
        $this->authorizeRoleOrPermission('ver usuarios');

        if ($this->search) {
            $this->reset_page();
        }

        $users = UserModel::where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orderBy('created_at', 'desc')
                        ->paginate($this->paginate);

        $roles = RoleModel::all();

        return view('administration::livewire.user.user', compact('users', 'roles'));
    }

    /**
     * Funcion para guardar
     */
    public function store()
    {
        $data = $this->validate([
            'email' => 'required|unique:users|email',
            'name' => 'required',
            'password' => 'required'
        ], $this->messages);
        if ($this->role) {
            if ($user = UserModel::create($data)) {
                // Encripta la contraseña
                $password = Hash::make($this->password);
                $user->fill(['password' => $password])->save();
                // filtra los roles para el usuario
                $array_filtered = array_filter($this->role, function ($value) {
                    return !empty($value);
                });
                // asigna los roles al usuario
                $user->roles()->sync($array_filtered);
                session()->flash('success', 'Usuario Creado Correctamente.');
            } else {
                session()->flash('error', $user->description);
            }
        } else {
            session()->flash('error', 'escoja un rol.');
        }
        $this->resetInputFields();
        $this->emit('hideModal');
    }

    /**
     * Funcion para modal editar
     */
    public function edit($id)
    {
        $user = UserModel::find($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $aux_roles = [];
        foreach ($user->roles as $rol) {
            $aux_roles[$rol->id] = $rol->id;
        }
        $this->role = $aux_roles;
        $this->deleteMode = 0;
    }

    /**
     * Funcion para actualizar
     */
    public function update()
    {
        $data = $this->validate([
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'name' => 'required'
        ], $this->messages);

        $user = UserModel::find($this->user_id);
        if ($this->role) {
            if ($user) {
                $user->update($data);
                // Si completa el input password actualiza la contraseña
                if (!empty($this->password)) {
                    $password = Hash::make($this->password);
                    $user->fill(['password' => $password])->save();
                }
                // filtra los roles
                $array_filtered = array_filter($this->role, function ($value) {
                    return !empty($value);
                });
                // asigna los roles al usuario
                $user->roles()->sync($array_filtered);
                session()->flash('success', 'Usuario Actualizado Correctamente.');
            } else {
                session()->flash('error', 'No se encontró el usuario.');
            }
        } else {
            session()->flash('error', 'escoja un rol.');
        }

        $this->resetInputFields();
        $this->emit('hideModal');
    }

    /**
     * Funcion para modal eliminar
     */
    public function delete($id)
    {
        $user = UserModel::find($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $aux_roles = [];
        foreach ($user->roles as $rol) {
            $aux_roles[$rol->id] = $rol->id;
        }
        $this->role = $aux_roles;
        $this->deleteMode = 1;
    }

    /**
     * Funcion para eliminar
     */
    public function destroy()
    {
        if ($this->user_id) {

            if (UserModel::where('id', $this->user_id)->delete()) {
                session()->flash('success', 'Usuario Borrado Correctamente.');
            } else {
                session()->flash('error', 'Error al borrar el usuario.');
            }
        }
        $this->resetInputFields();
        $this->deleteMode = false;
        $this->emit('hideModal');
    }

    /**
     * Funcion para btn cancelar en Modales
     */
    public function cancel()
    {
        $this->user_id = null;
        $this->deleteMode = false;
        $this->resetInputFields();
    }

    /**
     * Función para resetear inpus
     */
    public function resetInputFields()
    {
        $this->reset(['name', 'email', 'password']);
        $this->resetValidation();
        unset($this->role);
        $this->user_id = null;
        $this->deleteMode = false;
    }

    /**
     * Funcion para resetear paginacion
     */
    public function reset_page()
    {
        $this->reset('page');
        $this->paginators['page'] = 1; //Se reinicia la paginacion
    }
}
