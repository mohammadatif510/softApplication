<?php

namespace App\Http\Services;

use App\Jobs\SendUserUpdateEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App\Jobs\SendUserWelcomeEmail;

class UserService
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function createUser(array $data)
    {
        $password = Str::random(12);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($password),
            'deActive' => 0
        ]);

        SendUserWelcomeEmail::dispatch($user, $password);

        Log::info("User Created {$user->name} By " . optional(Auth::user())->name);

        return $user;
    }

    public function updateUser(array $data)
    {

        $password = Str::random(12);

        $user = User::findOrFail($data['userId']);

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($password),
            'deActive' => 0
        ]);

        SendUserUpdateEmail::dispatch($user, $password);

        Log::info("User Created {$user->name} By " . optional(Auth::user())->name);

        return $user;
    }

    public function getUserWithRoles($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::whereNot('name', 'admin')->get();

        return compact('user', 'roles');
    }

    public function assignRoles($userId, array $roleIds)
    {
        $user = User::findOrFail($userId);
        $roleNames = Role::whereIn('id', $roleIds)->pluck('name')->toArray();
        $user->syncRoles($roleNames);

        Log::info("Roles assigned to {$user->name} by " . optional(Auth::user())->name);
    }

    public function toggleUserStatus($userId)
    {
        $user = User::findOrFail($userId);

        $status = $user->deActive == 0 ? 1 : 0;
        $user->update(['deActive' => $status]);

        Log::info("User status changed by: " . optional(Auth::user())->name);

        return [
            'res' => $status ? 'error' : 'success',
            'message' => $status ? "User Deactivated successfully!" : "User Activated successfully!"
        ];
    }
}
