<?php

namespace Modules\Inventory\Http\Livewire\Product;

//Library
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

//Models
use Modules\Inventory\Entities\Product as ProductModel;
use Modules\Inventory\Entities\Category as CategoryModel;

// Traits
use App\Traits\AuthorizesRoleOrPermission;


class Product extends Component
{
    use WithPagination;
    use AuthorizesRoleOrPermission;
    use WithFileUploads;

    public $product_id, $code, $name, $description, $purchase_price, $sale_price, $stock, $minimum_stock, $image, $product_image;
    public $deleteMode, $search;
    public $categories, $category_id;


    public function render()
    {
        $this->authorizeRoleOrPermission('ver productos');

        $categories = CategoryModel::get();
        $aux_categories = [];
        foreach ($categories as $category) {
            $aux_categories[$category->id] = $category->name;
        }
        $this->categories = $aux_categories;

        if ($this->search) {
            $this->reset_page();
        }

        $products = ProductModel::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('code', 'like', '%' . $this->search . '%')
            ->orderBy('id')
            ->paginate(5);
        return view('inventory::livewire.product.product', compact('products'));
    }

    public function store()
    {
        $data = $this->validate([
            'code' => 'required|unique:products,code',
            'name' => 'required',
            'description' => 'required',
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'stock' => 'required|numeric',
            'minimum_stock' => 'required|numeric',
            "category_id" => 'required'
        ]);
        if ($this->image) {
            $customName = 'product' . $this->code;
            $extension = $this->image->getClientOriginalExtension();
            $path = $this->image->storeAs('products', $customName . '.' . $extension, 'public');
            $data['image'] = $path;
        }

        if ($store = ProductModel::create($data)) {
            session()->flash('success', 'Producto creado correctamente.');
        } else {
            session()->flash('error', $store->description);
        }

        $this->resetInputFields();
        $this->emit('hideModal');
    }

    public function edit($id)
    {
        $product = ProductModel::find($id);
        $this->product_id = $id;
        $this->category_id = $product->category_id;
        $this->code = $product->code;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->purchase_price = $product->purchase_price;
        $this->sale_price = $product->sale_price;
        $this->stock = $product->stock;
        $this->minimum_stock = $product->minimum_stock;
        $this->product_image = $product->image;
        // $this->image= $product->image;
    }

    public function update()
    {

        $data = $this->validate([
            'code' => 'required|unique:products,code,' . $this->product_id,
            'name' => 'required',
            'description' => 'required',
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'stock' => 'required|numeric',
            'minimum_stock' => 'required|numeric',
            "category_id" => 'required'
        ]);

        $product = ProductModel::find($this->product_id);

        if ($product) {
            if ($this->image) {
                // Eliminar la foto anterior del usuario si existe
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }
                $customName = 'product' . $this->code;
                $extension = $this->image->getClientOriginalExtension();
                $path = $this->image->storeAs('products', $customName . '.' . $extension, 'public');
                $data['image'] = $path;
            }

            $product->update($data);
            session()->flash('success', 'Producto Actualizado Correctamente.');
        } else {
            session()->flash('error', 'No se encontró el producto.');
        }

        $this->resetInputFields();
        $this->emit('hideModal');
    }

    public function delete($id)
    {
        $product = ProductModel::find($id);
        $this->product_id = $id;
        $this->category_id = $product->category_id;
        $this->code = $product->code;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->purchase_price = $product->purchase_price;
        $this->sale_price = $product->sale_price;
        $this->stock = $product->stock;
        $this->minimum_stock = $product->minimum_stock;
        $this->product_image = $product->image;
        $this->deleteMode = true;
    }


    public function destroy()
    {
        if ($this->product_id) {

            $product = ProductModel::find($this->product_id);

            if ($product) {
                if ($product->delete()) {
                    session()->flash('success', 'Permiso Borrado Correctamente.');
                } else {
                    session()->flash('error', 'Error al borrar el permiso.');
                }
            } else {
                session()->flash('error', 'El permiso no existe.');
            }
        }
        $this->resetInputFields();
        $this->deleteMode = false;
        $this->emit('hideModal');
    }

    public function cancel()
    {
        $this->product_id = null;
        $this->deleteMode = false;
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->resetValidation();
        $this->product_id = null;
        $this->code = null;
        $this->name = null;
        $this->description = null;
        $this->purchase_price = null;
        $this->sale_price = null;
        $this->stock = null;
        $this->minimum_stock = null;
        $this->image = null;
        $this->product_image = null;
        $this->category_id = null;
    }

    public function reset_page()
    {
        $this->reset('page');
        $this->paginators['page'] = 1; //Se reinicia la paginacion
    }
}
