<?php

namespace Modules\SalesManagment\Http\Livewire\Order;

use Livewire\Component;
use Livewire\WithPagination;
// Traits
use App\Traits\AuthorizesRoleOrPermission;
//Models
use Modules\Inventory\Entities\Product as ProductModel;
use Modules\Inventory\Entities\Category as CategoryModel;

class Order extends Component
{
    use AuthorizesRoleOrPermission;
    use WithPagination;

    public $products, $categories;
    public $deleteMode, $search, $paginate = 8;
    public $date;

    public function mount() {
        $this->categories=CategoryModel::with('products')->get();
    }

    public function render()
    {
        $this->authorizeRoleOrPermission('ver productos');

        $products = ProductModel::where('name', 'like', '%' . $this->search . '%')
                                ->orWhere('code', 'like', '%' . $this->search . '%')
                                ->orderBy('id')
                                ->paginate($this->paginate);
        
        return view('salesmanagment::livewire.order.order', compact('products'));
    }
}
