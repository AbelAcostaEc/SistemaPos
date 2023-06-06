<?php

namespace Modules\Administration\Http\Livewire\Role;

//Library
use Livewire\Component;
use Livewire\WithPagination;

//Models
use Spatie\Permission\Models\Permission;
use Modules\Administration\Entities\Role as RoleModel;

//Traits
use App\Traits\AuthorizesRoleOrPermission;

class Role extends Component
{
    use WithPagination;
    use AuthorizesRoleOrPermission;

    public $search;
    public $name, $role_id, $role_view, $permission;
    public $deleteMode = false, $paginate = 5;

    public function render()
    {
        $this->authorizeRoleOrPermission('ver roles');

        if ($this->search) {
            $this->reset_page();
        }

        $search = $this->search;
        $roles = RoleModel::where('name', 'like', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate);

        $permissions = Permission::all();
        return view('administration::livewire.role.role', compact('roles', 'permissions'));
    }

    /**
     * Función para guardar
     */
    public function store()
    {
        $data = $this->validate([
            'name' => 'required'
        ]);
        $data['guard_name'] = "web";
        //crea el rol, añadiendo los permisos asignados
        if ($role = RoleModel::create($data)) {
            $role->permissions()->attach($this->permission);
            session()->flash('success', 'Rol Creado Correctamente.');
        } else {
            session()->flash('error', $role->description);
        }
        $this->resetInputFields();
        $this->emit('hideModal');
    }

    /**
     * Función para el modal editar
     */
    public function edit($id)
    {
        $role = RoleModel::find($id);
        $this->role_id = $id;
        $this->name = $role->name;

        $aux_permission = [];
        foreach ($role->permissions as $permission) {
            $aux_permission[$permission->id] = $permission->id;
        }
        $this->permission = $aux_permission;
    }

    /**
     * Función para actualizar
     */
    public function update()
    {
        $data = $this->validate([
            'name' => 'required'
        ]);

        $role = RoleModel::find($this->role_id);

        if ($role) {
            $role->update($data);

            $array_filtered = array_filter($this->permission, function ($value) {
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

    /**
     * Función para modal eliminar
     */
    public function delete($id)
    {
        $role = RoleModel::find($id);
        $this->role_id = $id;
        $this->name = $role->name;
        $this->deleteMode = true;

        $aux_permission = [];
        foreach ($role->permissions as $permission) {
            $aux_permission[$permission->id] = $permission->id;
        }
        $this->permission = $aux_permission;
    }

    /**
     * Función para eliminar
     */
    public function destroy()
    {
        if ($this->role_id) {
            $role = RoleModel::find($this->role_id);

            if ($role->users()->exists()) {
                session()->flash('error', 'No se puede eliminar el rol porque está asignado a uno o más usuarios.');
            } else {
                if ($role->delete()) {
                    session()->flash('success', 'Rol Borrado Correctamente.');
                } else {
                    session()->flash('error', 'Error al borrar el Rol.');
                }
            }
        }
        $this->resetInputFields();
        $this->deleteMode = false;
        $this->emit('hideModal');
    }

    /**
     * Funcion para visualizar informacion de rol
     */
    public function view($id)
    {
        $role = RoleModel::find($id);
        // dd($id,$role);
        $this->role_view = $role;
        /* $this->role_id=$id;
        $this->permissions_role = $role->permissions(); */
    }

    /**
     * Función para cancelar en Modales
     */
    public function cancel()
    {
        $this->deleteMode = false;
        $this->resetInputFields();
        $this->emit('hideModal');
    }

    /**
     * Funcion para resetear inputs
     */
    public function resetInputFields()
    {
        $this->resetValidation();
        $this->role_id = null;
        $this->deleteMode = false;
        $this->name = null;
        $this->role_view = null;
        unset($this->permission);
    }

    /**
     * Funcion para resetear paginación
     */
    public function reset_page()
    {
        $this->reset('page');
        $this->paginators['page'] = 1; //Se reinicia la paginacion
    }
}
