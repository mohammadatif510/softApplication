<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RoleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleCategories extends Controller
{
    public function __construct()
    {
        session()->put('title', 'Role Category Details');
    }
    public function index()
    {

        $roleCategories = RoleCategory::all();
        return view('roleCategory.index', ['roleCategories' => $roleCategories]);
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

        return view('roleCategory.modals.editRoleCategory', compact('roleCategory'));
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
            return response()->json(['message' => 'This category can not be deleted becuase of a "Main Role"!']);
        }

        RoleCategory::findOrfail($id)->delete();

        return response()->json(['message' => 'Role Category deleted successfully!']);
    }
}
