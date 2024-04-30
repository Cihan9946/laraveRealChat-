<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Middleware\PermissionMiddleware;

class Permission
{
    public $permission;

    public function __construct(\App\Http\Helpers\Permission\Permission $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission, $guard = null)
    {
        $permission_middleware = new PermissionMiddleware();
        if ($request->method() == 'GET') {
            $permission = 'read ' . $permission;
        } else if ($request->method() == 'POST') {
            $permission = 'create ' . $permission;
        } else if ($request->method() == 'PATCH' || $request->method() == 'PUT') {
            $permission = 'update ' . $permission;
        } else if ($request->method() == 'DELETE') {
            $permission = 'delete ' . $permission;
        } else {
            $permission = '';
        }

        return $permission_middleware->handle($request, $next, $permission, $guard);
    }

}
