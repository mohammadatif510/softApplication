<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleFormRequest;
use App\Http\Services\RoleService;
use App\Models\RoleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    protected $role_service;

    public function __construct(RoleService $role_service)
    {
        session()->put('title', 'Role Details');

        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Only admin have access');
        }

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

    public function assignPermission($roleId)
    {
        $role = Role::findOrFail($roleId);
        $permissions = Permission::all();

        // Group permissions by prefix (assuming permission names like 'profile.view', 'dashboard.edit', etc.)
        $groupedPermissions = [];

        foreach ($permissions as $permission) {
            $parts = explode('.', $permission->name);
            $group = $parts[0]; // 'profile', 'dashboard', etc.
            $groupedPermissions[$group][] = $permission;
        }

        $rolePermissions = $role->permissions;

        return view('admin.role.modals.assignPermission', compact('role', 'groupedPermissions', 'rolePermissions'));
    }

    public function updaetAssignPermission(Request $request)
    {
        $request->validate([
            'roleId' => 'required|exists:roles,id',
            'permission' => 'array',
            'permission.*' => 'exists:permissions,id',
        ]);

        try {

            $role = Role::findOrFail($request->roleId);

            $permissionIds = $request->permission ?? [];
            $permissions = Permission::whereIn('id', $permissionIds)->get();

            $role->syncPermissions($permissions);

            Log::info("Permissions assigned to role ID: {$role->id}");

            return response()->json([
                'success' => true,
                'message' => 'Permissions assigned successfully.',
            ]);
        } catch (\Throwable $e) {
            Log::error('Assign permission error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to assign permission. Try again.',
            ], 500);
        }
    }

    public function delete($id, $roleName)
    {
        if ($roleName === 'admin') {

            return response()->json(['message' => 'Admin role cannot be deleted!']);
        }

        $this->role_service->roleDelete($id);

        return response()->json(['message' => 'Role deleted successfully!']);
    }
}
