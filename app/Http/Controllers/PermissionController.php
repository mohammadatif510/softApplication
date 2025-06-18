<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct()
    {
        session()->put('title', 'Permission Details');
    }


    public function index()
    {
        try {
            $permissions = Permission::with('roles')->get();
            $roles = Role::all();

            return view('permission.index', compact('permissions', 'roles'));
        } catch (\Throwable $e) {
            Log::error('Permission index error' . $e->getMessage());
            abort(500, 'Something went wrong! please try again');
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|unique:permissions,name',
            ]);

            $permission = Permission::create([
                'name' => $validated['name'],
                'guard_name' => 'web',
            ]);

            Log::info("Permission created: {$permission->name} by user ID " . Auth::id());

            return response()->json([
                'success' => true,
                'message' => 'Permission created successfully',
                'data' => $permission
            ]);
        } catch (\Throwable $e) {
            Log::error('Permission store error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to create permission. Try again.',
            ], 500);
        }
    }

    public function edit($id)
    {
        try {
            $permission = Permission::findOrFail($id);

            $user = Auth::user();
            $roles = $user->getRoleNames()->implode(', ');

            Log::info("Permission edit: {$permission->name} by user: '{$user->name}' user Id:" . Auth::user()->id);


            return view('permission.modals.editPermission', compact('permission'));
        } catch (\Throwable $e) {
            Log::error('Permission delete error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to delete permission. Try again.',
            ], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            // Validate with unique rule, ignoring current ID
            $validated = $request->validate([
                'permissionId' => 'required|exists:permissions,id',
                'name' => 'required|string|max:255|unique:permissions,name,' . $request->id,
            ]);

            $permission = Permission::findOrFail($validated['permissionId']);
            $permission->update([
                'name' => $validated['name'],
                'guard_name' => 'web',
            ]);

            $user = Auth::user();
            $roles = $user->getRoleNames()->implode(', ');

            Log::info("Permission updated: {$permission->name} by user: {$user->name}, roles: {$roles}");

            return response()->json([
                'success' => true,
                'message' => 'Permission updated successfully',
                'data' => $permission,
            ]);
        } catch (\Throwable $e) {
            Log::error('Permission update error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to update permission. Try again.',
            ], 500);
        }
    }


    public function delete($id)
    {
        try {
            $permission = Permission::findOrFail($id);
            $permission->delete();

            $user = Auth::user();
            $roles = $user->getRoleNames()->implode(', ');

            Log::info("Permission deleted: {$permission->name} by user: {$user->name}, role: {$roles}");

            return response()->json([
                'success' => true,
                'message' => 'Permission deleted successfully',
            ]);
        } catch (\Throwable $e) {
            Log::error('Permission delete error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to delete permission. Try again.',
            ], 500);
        }
    }
}
