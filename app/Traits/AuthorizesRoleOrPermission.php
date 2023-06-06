<?php

namespace App\Traits;

//Library
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

trait AuthorizesRoleOrPermission
{
    /**
     * Funcion para permitir visualizar 
     */
    public function authorizeRoleOrPermission($roleOrPermission, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        $rolesOrPermissions = is_array($roleOrPermission) ? $roleOrPermission : explode('|', $roleOrPermission);

        if (!Auth::guard($guard)->user()->hasAnyRole($rolesOrPermissions) && !Auth::guard($guard)->user()->hasAnyPermission($rolesOrPermissions)) {
            throw UnauthorizedException::forRolesOrPermissions($rolesOrPermissions);
        }
    }
}
