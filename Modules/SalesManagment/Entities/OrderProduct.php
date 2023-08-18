<?php

namespace Modules\SalesManagment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [''];

    /**
     * Relation Model Order
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * Relation Model Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
