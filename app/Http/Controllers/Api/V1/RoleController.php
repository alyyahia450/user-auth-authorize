<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

use App\Models\Role;
use App\Http\Resources\RoleResource;

use Symfony\Component\HttpFoundation\Response;

use App\Traits\ResponseFormatTrait;

class RoleController extends Controller
{
    use ResponseFormatTrait;

    public function __construct()
    {
        $this->middleware('scope:role_access')->only('index');
        $this->middleware('scope:role_show')->only('show');
        $this->middleware('scope:role_delete')->only('destroy');
    }

    public function index()
    {
       return $this->sendResponse(RoleResource::collection(Role::with(['permissions'])->get()), 'Roles');
    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->validated());
        $role->permissions()->sync($request->input('permissions', []));

        return $this->sendResponse(new RoleResource($role->load('permissions')), 'Role Created');
    }

    public function show(Role $role)
    {
  
        return $this->sendResponse(new RoleResource($role->load(['permissions'])), 'Role');
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        $role->permissions()->sync($request->input('permissions', []));

        return $this->sendResponse(new RoleResource($role->load('permissions')), 'Role Updated');
    }

    public function destroy(Role $role)
    {
       
        $role->delete();

        return $this->sendResponse(null, 'Role Deleted');
    }
}