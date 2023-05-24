<?php

namespace Modules\Administration\Http\Livewire\Permission;

use Livewire\Component;
use App\Traits\AuthorizesRoleOrPermission;

use Spatie\Permission\Models\Permission as PermissionModel;
use Livewire\WithPagination;

class Permission extends Component
{
    use WithPagination;
    use AuthorizesRoleOrPermission;


    public $deleteMode=false;
    public $name, $permission_id;
    public $search;
    public $page=1;


    public function render()
    {
        $this->authorizeRoleOrPermission('ver permisos');

        if($this->search){
            $this->reset_page();
        }

        $permissions=PermissionModel::where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('id', 'like', '%' . $this->search . '%')
                        ->orderBy('id')
                        ->paginate(5);

        return view('administration::livewire.permission.permission', compact('permissions'));
    }

    public function store()
    {
        $data= $this->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        if($store = PermissionModel::create($data)){
            session()->flash('success', 'Permiso creado correctamente.');
        }else{
            session()->flash('error', $store->description);
        }

        $this->resetInputFields();
        $this->emit('hideModal');
    }

    public function edit($id)
    {
        $permission=PermissionModel::find($id);
        $this->permission_id=$id;
        $this->name=$permission->name;
    }

    public function update(){

        $data= $this->validate([
            'name' => 'required|unique:permissions,name,'.$this->permission_id,
        ]);

        $permission=PermissionModel::find($this->permission_id);

        if($permission)
        {
            $permission->update($data);
            session()->flash('success', 'Permiso Actualizado Correctamente.');
        } else {
            session()->flash('error', 'No se encontró el permiso.');
        }

        $this->resetInputFields();
        $this->emit('hideModal');
    }

    public function delete($id)
    {
        $permission=PermissionModel::find($id);
        $this->permission_id=$id;
        $this->name=$permission->name;
        $this->deleteMode=true;
    }


    public function destroy()
    {
        if($this->permission_id){

            $permission = PermissionModel::find($this->permission_id);

            if ($permission) {
                // Verificar si el permiso está asignado a algún rol
                if ($permission->roles()->exists()) {
                    session()->flash('error', 'No se puede eliminar el permiso porque está asignado a uno o más roles.');
                } else {
                    if ($permission->delete()) {
                        session()->flash('success', 'Permiso Borrado Correctamente.');
                    } else {
                        session()->flash('error', 'Error al borrar el permiso.');
                    }
                }
            } else {
                session()->flash('error', 'El permiso no existe.');
            }
        }
        $this->resetInputFields();
        $this->deleteMode=false;
        $this->emit('hideModal');
    }

    public function cancel()
    {
        $this->permission_id=null;
        $this->deleteMode=false;
        $this->resetInputFields();
    }

    public function resetInputFields(){
        $this->resetValidation();
        $this->name=null;
        $this->permission_id=null;
        $this->deleteMode=false;
    }

    public function reset_page(){
        // $this->reset('page');
        $this->paginators['page'] = 1; //Se reinicia la paginacion
    }

    public function pagination($number){
		$this->limit = $number;
	}

}
