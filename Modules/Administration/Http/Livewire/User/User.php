<?php

namespace Modules\Administration\Http\Livewire\User;

use Livewire\Component;
use App\Traits\AuthorizesRoleOrPermission;

use Illuminate\Support\Facades\Hash;
use App\Models\User as UserModel;
use Modules\Administration\Entities\Role as RoleModel;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    use AuthorizesRoleOrPermission;

    public $name, $email, $password,$user_id, $role;
    public $messages;
    public $deleteMode=false;
    public $search;

    public function mount(){

        $this->messages=[
            'required' => 'El campo :attribute es obligatorio.',
            'email' => 'El campo :attribute debe ser un correo electrónico válido.',
            'unique' => 'El :attribute ya está en uso.',
            'min'=>'Elija por lo menos un :attribute'
        ];

    }

    public function render()
    {
        $this->authorizeRoleOrPermission('ver usuarios');

        $search=$this->search;
        $users=UserModel::where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orderBy('created_at','desc')
                        ->paginate(10);
        $roles=RoleModel::all();
        return view('administration::livewire.user.user', compact('users','roles'));
    }

    public function store()
    {
        $data= $this->validate([
            'email' => 'required|unique:users|email',
            'name' => 'required',
            'password'=> 'required'
        ], $this->messages);
        if($this->role){
            if($user = UserModel::create($data)){
                $password = Hash::make($this->password);
                $user->fill(['password' => $password])->save();

                $array_filtered = array_filter($this->role, function($value) {
                    return !empty($value);
                });

                $user->roles()->sync($array_filtered);
                session()->flash('success', 'Usuario Creado Correctamente.');
            }else{
                session()->flash('error', $store->description);
            }
        }else{
            session()->flash('error', 'escoja un rol.');
        }
        $this->resetInputFields();
        $this->emit('hideModal');
    }

    public function edit($id)
    {
        $user=UserModel::find($id);
        $this->user_id=$id;
        $this->name=$user->name;
        $this->email=$user->email;
        $aux_roles = [];
        foreach($user->roles as $rol){
            $aux_roles[$rol->id] = $rol->id;
        }
        $this->role = $aux_roles;
        $this->delete = 0;
    }

    public function update(){

        $data = $this->validate([
            'email' => 'required|email|unique:users,email,'.$this->user_id,
            'name' => 'required'
        ], $this->messages);

        $user = UserModel::find($this->user_id);
        if($this->role){
            if($user) {
                $user->update($data);

                if(!empty($this->password)) {
                    $password = Hash::make($this->password);
                    $user->fill(['password' => $password])->save();
                }

                $array_filtered = array_filter($this->role, function($value) {
                    return !empty($value);
                });

                $user->roles()->sync($array_filtered);

                session()->flash('success', 'Usuario Actualizado Correctamente.');
            } else {
                session()->flash('error', 'No se encontró el usuario.');
            }
        }else{
            session()->flash('error', 'escoja un rol.');
        }

        $this->resetInputFields();
        $this->emit('hideModal');
    }

    public function delete($id)
    {
        $user=UserModel::find($id);
        $this->user_id=$id;
        $this->name=$user->name;
        $this->email=$user->email;
        $aux_roles = [];
        foreach($user->roles as $rol){
            $aux_roles[$rol->id] = $rol->id;
        }
        $this->role = $aux_roles;
        $this->delete = 1;
    }
    public function destroy()
    {
        if($this->user_id){

            if(UserModel::where('id', $this->user_id)->delete()){
                session()->flash('success', 'Usuario Borrado Correctamente.');
            }else{
                session()->flash('error', 'Error al borrar el usuario.');
            }
        }
        $this->resetInputFields();
        $this->deleteMode=false;
        $this->emit('hideModal');
    }

    public function cancel()
    {
        $this->user_id=null;
        $this->deleteMode=false;
        $this->resetInputFields();
    }

    public function resetInputFields(){
        $this->reset(['name', 'email', 'password']);
        $this->resetValidation();
        unset($this->role);
        $this->user_id=null;
        $this->deleteMode=false;
    }

    public function reset_page(){
		$this->reset('page');
	}

    public function abrir($id)
    {
        session(['ejemploMole' => $id]);
        return redirect()->route('profile');
    }

}
