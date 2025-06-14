<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleCategories extends Controller
{
    public function __construct()
    {
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Only admin have access');
        }
    }
    public function index()
    {
        session()->put('title', 'Role Category Details');

        $roleCategories = RoleCategory::all();
        return view('admin.roleCategory.index', ['roleCategories' => $roleCategories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:role_categories,name'
        ]);

        RoleCategory::create($request->all());

        return response()->json(['message' => 'Role Category created successfully!']);
    }

    public function edit($id)
    {
        $roleCategory = RoleCategory::findOrfail($id);

        return view('admin.roleCategory.modals.editRoleCategory', compact('roleCategory'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        RoleCategory::findOrfail($request->id)->update($request->all());

        return response()->json(['message' => 'Role Category updated successfully!']);
    }

    public function delete($id, $roleCategoryName)
    {
        if ($roleCategoryName == 'Management') {
            abort(403, 'This category can not be deleted becuase of a "Main Role" you can delete role of this category');
        }

        RoleCategory::findOrfail($id)->delete();

        return response()->json(['message' => 'Role Category deleted successfully!']);
    }
}
