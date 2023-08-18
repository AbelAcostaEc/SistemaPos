<?php

namespace Modules\SalesManagment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [''];

    /**
     * Relation Model OrderProduct
     */
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    /**
     * Relation Model Customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * Relation Model PaymentMethod
     */
    public function paymenthMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'customer_id');
    }
    
}
