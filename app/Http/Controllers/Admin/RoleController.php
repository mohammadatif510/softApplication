<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleFormRequest;
use App\Http\Services\RoleService;
use App\Models\RoleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    protected $role_service;

    public function __construct(RoleService $role_service)
    {
        session()->put('title', 'Role Details');

        $this->role_service = $role_service;
    }

    public function index()
    {

        $rolesAndCategories = $this->role_service->roleIndex();

        $roles = $rolesAndCategories['roles'];
        $roleCategories = $rolesAndCategories['roleCategories'];

        return view('admin.role.index', compact('roles', 'roleCategories'));
    }

    public function store(RoleFormRequest $request)
    {
        $this->role_service->roleStore($request->all());

        return response()->json(['message' => 'Role created successfully!']);
    }

    public function edit($id)
    {
        $roleData = Role::findOrfail($id);
        $roleCategories = RoleCategory::all();
        return view('admin.role.modals.editRole', compact('roleData', 'roleCategories'));
    }

    public function update(RoleFormRequest $request)
    {

        $validator = $request->validated();

        $this->role_service->roleUpdate($validator);

        return response()->json(['message' => 'Role updated successfully']);
    }

    public function delete($id, $roleName)
    {
        if ($roleName === 'admin') {
            abort(403, 'Admin role cannot be deleted.');
        }

        $this->role_service->roleDelete($id);

        return response()->json(['message' => 'Role deleted successfully!']);
    }
}
