<?php

namespace Modules\SalesManagment\Http\Livewire\Order;

// Librarys
use Livewire\Component;
use Livewire\WithPagination;
// Traits
use App\Traits\AuthorizesRoleOrPermission;
//Models
use Modules\Inventory\Entities\Product as ProductModel;
use Modules\SalesManagment\Entities\Order as OrderModel;

class Order extends Component
{
    use AuthorizesRoleOrPermission;
    use WithPagination;

    public $products, $categories;
    public $deleteMode, $search, $paginate = 8;
    public $date;

    public function mount() {
        $test = OrderModel::get();                
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
