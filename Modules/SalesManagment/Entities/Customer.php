<?php

namespace Modules\SalesManagment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [''];

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
