<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

        session()->put('title', 'User Details');
    }

    public function index()
    {
        try {
            $users = $this->userService->getAllUsers();
            return view('user.index', compact('users'));
        } catch (\Throwable $th) {
            Log::error("User index error: " . $th->getMessage());
            abort(500, 'Something went wrong! please try again');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email'
        ]);

        try {
            $user = $this->userService->createUser($validated);

            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
                'data' => $user
            ]);
        } catch (\Throwable $th) {
            Log::error('User store error: ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to create user. Try again.',
            ], 500);
        }
    }

    public function edit($id)
    {
        $user = User::findOrfail($id);

        return view('user.modals.editUser', compact('user'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $request->userId,
            'userId' => 'required|exists:users,id',
        ]);

        try {
            $user = $this->userService->updateUser($validated);

            return response()->json([
                'success' => true,
                'message' => 'User updated successfully',
                'data' => $user
            ]);
        } catch (\Throwable $th) {
            Log::error('User update error: ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to update user. Try again.',
            ], 500);
        }
    }

    public function assignRole($id)
    {
        try {
            $data = $this->userService->getUserWithRoles($id);
            return view('user.modals.assignRole', $data);
        } catch (\Throwable $th) {
            Log::error('Fetching user assign role error: ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch assign role. Try again.',
            ], 500);
        }
    }

    public function storeAssignRole(Request $request)
    {
        try {
            $request->validate([
                'userId' => 'required|exists:users,id',
                'roles' => 'required|array',
                'roles.*' => 'exists:roles,id',
            ]);

            $this->userService->assignRoles($request->userId, $request->roles);

            return response()->json([
                'message' => 'Roles assigned successfully!',
            ]);
        } catch (\Throwable $th) {
            Log::error('User assign role error: ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to assign role. Try again.',
            ], 500);
        }
    }

    public function deactivate($userId)
    {
        try {
            $result = $this->userService->toggleUserStatus($userId);

            return response()->json([
                'res' => $result['res'],
                'message' => $result['message'],
            ]);
        } catch (\Throwable $th) {
            Log::error('User deactivate error: ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to deactivate user. Try again.',
            ], 500);
        }
    }
}
