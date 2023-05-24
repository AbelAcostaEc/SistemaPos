<?php

namespace Modules\Administration\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role as SpatieRole;


class Role extends SpatieRole
{
    use SoftDeletes;

    protected $fillable = ['name','guard_name'];

    /* public function users()
    {
        return $this->hasMany(User::class);
    } */
}
