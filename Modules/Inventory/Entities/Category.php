<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Modules\Inventory\Entities\Product;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
