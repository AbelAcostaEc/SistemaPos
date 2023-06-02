<?php

namespace Modules\Inventory\Http\Livewire\Category;

use Livewire\Component;
use Modules\Inventory\Entities\Category as CategoryModel;
use App\Traits\AuthorizesRoleOrPermission;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    use AuthorizesRoleOrPermission;

    public $deleteMode=false;
    public $name, $category_id;
    public $search;
    // public $categories;

    public function render()
    {
        $this->authorizeRoleOrPermission('ver categorias');        
        if($this->search){
            $this->reset_page();
        }

        $categories=CategoryModel::where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('id', 'like', '%' . $this->search . '%')
                        ->orderBy('id')
                        ->paginate(5);
        return view('inventory::livewire.category.category', compact('categories'));
    }

    public function store()
    {
        $data= $this->validate([
            'name' => 'required|unique:categories,name',
        ]);

        if($store = CategoryModel::create($data)){
            session()->flash('success', 'Categoria creado correctamente.');
        }else{
            session()->flash('error', $store->description);
        }

        $this->resetInputFields();
        $this->emit('hideModal');
        $this->emit('datatable');
    }

    public function edit($id)
    {
        $category=CategoryModel::find($id);
        $this->category_id=$id;
        $this->name=$category->name;
    }

    public function update(){

        $data= $this->validate([
            'name' => 'required|unique:categories,name,'.$this->category_id,
        ]);

        $category=CategoryModel::find($this->category_id);

        if($category)
        {
            $category->update($data);
            session()->flash('success', 'Permiso Actualizado Correctamente.');
        } else {
            session()->flash('error', 'No se encontró el permiso.');
        }

        $this->resetInputFields();
        $this->emit('hideModal');
        $this->emit('datatable');
    }

    public function delete($id)
    {
        $category=CategoryModel::find($id);
        $this->category_id=$id;
        $this->name=$category->name;
        $this->deleteMode=true;
    }


    public function destroy()
    {
        if($this->category_id){

            $category = CategoryModel::find($this->category_id);

            if ($category) {
                // Verificar si el permiso está asignado a algún rol
                if ($category->products()->exists()) {
                    session()->flash('error', 'No se puede eliminar el permiso porque está asignado a uno o más roles.');
                } else {
                    if ($category->delete()) {
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
        $this->emit('datatable');
    }

    public function cancel()
    {
        $this->category_id=null;
        $this->deleteMode=false;
        $this->resetInputFields();
        $this->emit('datatable');
    }

    public function resetInputFields(){
        $this->resetValidation();
        $this->name=null;
        $this->category_id=null;
        $this->deleteMode=false;
    }

    public function reset_page(){
        $this->reset('page');
        $this->paginators['page'] = 1; //Se reinicia la paginacion
    }

}
