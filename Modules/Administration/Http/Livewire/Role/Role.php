<?php

namespace Modules\Administration\Http\Livewire\Role;

use Livewire\Component;
use App\Traits\AuthorizesRoleOrPermission;

use Modules\Administration\Entities\Role as RoleModel;
use Spatie\Permission\Models\Permission;
use Livewire\WithPagination;

class Role extends Component
{
    use WithPagination;
    use AuthorizesRoleOrPermission;

    public $deleteMode=false;
    public $name, $role_id ,$role_view;
    public $search, $permission;

    public function render()
    {
        $this->authorizeRoleOrPermission('ver roles');

        $search=$this->search;
        $roles=RoleModel::where('name', 'like', '%' . $search . '%')
                        ->orderBy('created_at','desc')
                        ->paginate(10);

        $permissions=Permission::all();
        return view('administration::livewire.role.role', compact('roles','permissions'));
    }

    public function store()
    {
        $data= $this->validate([
            'name' => 'required'
        ]);
        $data['guard_name']="web";
        if($role = RoleModel::create($data)){

            $role->permissions()->attach($this->permission);
            session()->flash('success', 'Rol Creado Correctamente.');
        }else{
            session()->flash('error', $store->description);
        }
        $this->resetInputFields();
        $this->emit('hideModal');
    }

    public function edit($id)
    {
        $role=RoleModel::find($id);
        $this->role_id=$id;
        $this->name=$role->name;

        $aux_permission = [];
        foreach($role->permissions as $permission){
            $aux_permission[$permission->id] = $permission->id;
        }
        $this->permission = $aux_permission;
    }

    public function update(){

        $data= $this->validate([
            'name' => 'required'
        ]);

        $role = RoleModel::find($this->role_id);

        if($role) {
            $role->update($data);

            $array_filtered = array_filter($this->permission, function($value) {
                return !empty($value);
            });

            $role->permissions()->sync($array_filtered);
            session()->flash('success', 'Rol Actualizado Correctamente.');
        } else {
            session()->flash('error', 'No se encontró el Rol.');
        }

        $this->resetInputFields();
        $this->emit('hideModal');
    }

    public function delete($id)
    {
        $role = RoleModel::find($id);
        $this->role_id=$id;
        $this->name=$role->name;
        $this->deleteMode=true;

        $aux_permission = [];
        foreach($role->permissions as $permission){
            $aux_permission[$permission->id] = $permission->id;
        }
        $this->permission = $aux_permission;

    }
    public function destroy()
    {
        if($this->role_id){
            $role = RoleModel::find($this->role_id);

            if($role->users()->exists()){
                session()->flash('error', 'No se puede eliminar el rol porque está asignado a uno o más usuarios.');
            }else{
                if($role->delete()){
                    session()->flash('success', 'Rol Borrado Correctamente.');
                }else{
                    session()->flash('error', 'Error al borrar el Rol.');
                }
            }
        }
        $this->resetInputFields();
        $this->deleteMode=false;
        $this->emit('hideModal');
    }

    public function view($id)
    {
        $role=RoleModel::find($id);
        // dd($id,$role);
        $this->role_view=$role;
        /* $this->role_id=$id;
        $this->permissions_role = $role->permissions(); */
    }

    public function cancel()
    {
        $this->role_id=null;
        $this->deleteMode=false;
        $this->role_view=null;
        $this->resetInputFields();
        $this->emit('hideModal');

    }

    public function resetInputFields(){

        $this->resetValidation();
        $this->role_id=null;
        $this->deleteMode=false;
        $this->name=null;
        unset($this->permission);
    }

    public function reset_page(){
		$this->reset('page');
	}
}
