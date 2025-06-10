<?php

namespace App\Http\Services;

use App\Models\RoleCategory;
use Spatie\Permission\Models\Role;

class RoleService
{

    public function roleIndex()
    {
        $roleCategories = RoleCategory::all();
        $roles = Role::with('roleCategory')->get();

        return ['roles' => $roles, 'roleCategories' => $roleCategories];
    }

    public function roleStore(array $data)
    {
        return Role::create([
            'name' => $data['name'],
            'role_category_id' => $data['roleCategoryId']
        ]);
    }

    public function roleDelete($id)
    {
        return Role::findOrfail($id)->delete();
    }
}
