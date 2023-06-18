<?php

namespace Modules\Inventory\Http\Livewire\Product;

//Library
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\ValidationException;
//Models
use Modules\Inventory\Entities\Product as ProductModel;
use Modules\Inventory\Entities\Category as CategoryModel;

// Traits
use App\Traits\AuthorizesRoleOrPermission;


class Product extends Component
{
    use AuthorizesRoleOrPermission;
    use WithPagination;
    use WithFileUploads;

    public $product_id, $code, $name, $description, $purchase_price, $sale_price, $stock, $minimum_stock, $image, $product_image; // Formulario
    public $categories, $category_id; 
    public $deleteMode, $search, $paginate = 4;
    public $import_file;

    public function render()
    {
        $this->authorizeRoleOrPermission('ver productos');

        $categories = CategoryModel::get(); // Obtiene las categorias
        $aux_categories = [];
        foreach ($categories as $category) {
            $aux_categories[$category->id] = $category->name;
        }
        $this->categories = $aux_categories; // Genera el array id, nombre

        if ($this->search) {
            $this->reset_page();
        }
        // Consulta los productos filtrando con el buscador
        $products = ProductModel::where('name', 'like', '%' . $this->search . '%')
                                ->orWhere('code', 'like', '%' . $this->search . '%')
                                ->orderBy('id')
                                ->paginate($this->paginate);
                                
        return view('inventory::livewire.product.product', compact('products'));
    }

    /**
     * Función para guardar
     */
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
        
        // Verifica si se ha subido una imagen
        if ($this->image) {
            $customName = 'product' . $this->code; //define el nombre del archivo
            $extension = $this->image->getClientOriginalExtension(); // Obtiene la extension de la img
            $path = $this->image->storeAs('products', $customName . '.' . $extension, 'public'); //guarda la imagen en el Storage
            $data['image'] = $path; //Asigna la ruta  de la imagen guardada
        }

        if ($store = ProductModel::create($data)) {
            session()->flash('success', 'Producto creado correctamente.');
        } else {
            session()->flash('error', $store->description);
        }

        $this->resetInputFields();
        $this->emit('hideModal');
    }

    /**
     * Funcion para modal editar
     */
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
    }

    /**
     * Función para actualizar
     */
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
            // Verifica si se ha subido una imagen
            if ($this->image) {
                // Eliminar la foto anterior con la misma ruta si existe
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }
                $customName = 'product' . $this->code; //define el nombre del archivo
                $extension = $this->image->getClientOriginalExtension(); // Obtiene la extension de la img
                $path = $this->image->storeAs('products', $customName . '.' . $extension, 'public'); //guarda la imagen en el Storage
                $data['image'] = $path; //Asigna la ruta  de la imagen guardada
            }

            $product->update($data);
            session()->flash('success', 'Producto Actualizado Correctamente.');
        } else {
            session()->flash('error', 'No se encontró el producto.');
        }

        $this->resetInputFields();
        $this->emit('hideModal');
    }

    /**
     * Función para modal delete
     */
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

    /**
     * Función para eliminar
     */
    public function destroy()
    {
        if ($this->product_id) {

            $product = ProductModel::find($this->product_id);

            if ($product) {
                if ($product->delete()) {
                    session()->flash('success', 'Producto Borrado Correctamente.');
                } else {
                    session()->flash('error', 'Error al borrar el producto.');
                }
            } else {
                session()->flash('error', 'El producto no existe.');
            }
        }
        $this->resetInputFields();
        $this->deleteMode = false;
        $this->emit('hideModal');
    }

    /**
     * Funcion para importar productos desde un excel
     */
    public function import()
    {
        // Validar que se haya seleccionado un archivo para importar
        $this->validate([
            'import_file' =>'required'
        ]);
    
        try {
            // Columnas requeridas en el archivo
            $required_columns= ['Codigo', 'Nombre', 'Descripcion', 'Precio Compra', 'Precio Venta', 'Stock', 'Stock Minimo', 'Categoria'];
            // Convertir el archivo Excel en un array
            $columns = Excel::toArray([], $this->import_file)[0][0];
            $left_columns = array_diff($required_columns, $columns);  //verifica columnas faltantes
            $extra_columns = array_diff($columns, $required_columns); //verifica columnas adicionales en archivo
            // Verificar si las columnas necesarias están presentes en el archivo Excel
            if (!empty($left_columns) || !empty($extra_columns)) {
                $errorMessage = '';
                if (!empty($left_columns)) {
                    $errorMessage .= 'Faltan las siguientes columnas: ' . implode(', ', $left_columns) . '. ';
                }
                if (!empty($extra_columns)) {
                    $errorMessage .= 'Columnas erroneas encontradas: ' . implode(', ', $extra_columns) . '. ';
                }

                throw ValidationException::withMessages([
                    'import_file' => [$errorMessage],
                ]);
            }

            // Verificar el orden de las columnas
            if ($required_columns != $columns) {
                throw ValidationException::withMessages([
                    'import_file' => ['El archivo Excel no contiene el orden de columnas esperado.'],
                ]);
            }

            // Realizar la importación de datos y operaciones adicionales
            $data = Excel::toCollection([], $this->import_file)[0];
            foreach ($data->skip(1) as $row) {
                try {
                    ProductModel::create([
                        'code' => $row[0],
                        'name' => $row[1],
                        'description' => $row[2],
                        'purchase_price' => $row[3],
                        'sale_price' => $row[4],
                        'stock' => $row[5],
                        'minimum_stock' => $row[6],
                        "category_id" => $row[7],
                    ]);
                } catch (\Exception $e) {
                    // Capturar excepción específica de creación de registros y mostrar mensaje de error
                    session()->flash('error', 'Error al crear un registro: ' . $e->getMessage());
                }
            }
            
            session()->flash('success', 'La importación se completó correctamente.');
        } catch (ValidationException $e) {
            // Capturar excepción de validación y obtener mensajes de error
            $errorMessages = $e->validator->errors()->all();
            $errorMessage = implode('<br>', $errorMessages);
            session()->flash('error', $errorMessage);
        } catch (\Exception $e) {
            // Capturar cualquier otra excepción y mostrar mensaje genérico
            session()->flash('error', 'Ocurrió un error al importar el archivo Excel: '.$e->getMessage());
        }
        $this->resetInputFields();
        $this->emit('hideModal');
    }
    
    /**
     * Función para botón cancelar de modales
     */
    public function cancel()
    {
        $this->product_id = null;
        $this->deleteMode = false;
        $this->resetInputFields();
    }

    /**
     * Funcion para resetear los inputs
     */
    public function resetInputFields()
    {
        $this->resetValidation(); // Resetea la validación
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
        // importacion
        $this->import_file = null;
    }

    /**
     * Función para resetear la paginación
     */
    public function reset_page()
    {
        $this->reset('page');
        $this->paginators['page'] = 1; //Se reinicia la paginacion
    }
}
