<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Modules\Inventory\Entities\Category;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * Relation Model Categories.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
}
