<?php

namespace Modules\Administration\Http\Livewire\Permission;

//Library
use Livewire\Component;
use Livewire\WithPagination;

//Models
use Spatie\Permission\Models\Permission as PermissionModel;

//Traits
use App\Traits\AuthorizesRoleOrPermission;

class Permission extends Component
{
    use WithPagination;
    use AuthorizesRoleOrPermission;

    public $search;
    public $name, $permission_id,  $group;
    public $deleteMode = false, $paginate = 5;


    public function render()
    {
        $this->authorizeRoleOrPermission('ver permisos');

        if ($this->search) {
            $this->reset_page();
        }
        // Realiza la consulta segun el buscador
        $permissions = PermissionModel::where('name', 'like', '%' . $this->search . '%')
                                    ->orWhere('id', 'like', '%' . $this->search . '%')
                                    ->orderBy('id')
                                    ->paginate($this->paginate);

        return view('administration::livewire.permission.permission', compact('permissions'));
    }

    /**
     * Funcion para guardar
     */
    public function store()
    {
        $data = $this->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        if ($this->group == 1) {
            // Crear permisos de "crear", "ver", "editar" y "eliminar"
            $permissions = ['ver', 'crear', 'editar', 'eliminar'];
            foreach ($permissions as $permission) {
                $dataCreate = [];
                $dataCreate['name'] =  $permission . ' ' .  $data['name'];
                PermissionModel::create($dataCreate);
            }
            session()->flash('success', 'Grupo de Permisos creado correctamente.');
        } else {
            if ($store = PermissionModel::create($data)) {
                session()->flash('success', 'Permiso creado correctamente.');
            } else {
                session()->flash('error', $store->description);
            }
        }

        $this->resetInputFields();
        $this->emit('hideModal');
    }

    /**
     * Funcion para modal editar
     */
    public function edit($id)
    {
        $permission = PermissionModel::find($id);
        $this->permission_id = $id;
        $this->name = $permission->name;
    }

    /**
     *  Función para actualizar
     */
    public function update()
    {

        $data = $this->validate([
            'name' => 'required|unique:permissions,name,' . $this->permission_id,
        ]);

        $permission = PermissionModel::find($this->permission_id);

        if ($permission) {
            $permission->update($data);
            session()->flash('success', 'Permiso Actualizado Correctamente.');
        } else {
            session()->flash('error', 'No se encontró el permiso.');
        }

        $this->resetInputFields();
        $this->emit('hideModal');
    }

    /**
     * Función para modal eliminar
     */
    public function delete($id)
    {
        $permission = PermissionModel::find($id);
        $this->permission_id = $id;
        $this->name = $permission->name;
        $this->deleteMode = true;
    }

    /**
     * Funcion para eliminar
     */
    public function destroy()
    {
        if ($this->permission_id) {

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
        $this->deleteMode = false;
        $this->emit('hideModal');
    }

    /**
     * Funcion para cancelar en Modales
     */
    public function cancel()
    {
        $this->deleteMode = false;
        $this->resetInputFields();
    }

    /**
     * Funcion para resetear inputs
     */
    public function resetInputFields()
    {
        $this->resetValidation();
        $this->name = null;
        $this->permission_id = null;
        $this->deleteMode = false;
        $this->group = null;
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
