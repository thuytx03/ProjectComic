<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index', [
            'title' => 'Trang quản lý vai trò',
            'roles' => Role::latest()->paginate(5)
        ]);
    }
    public function create()
    {
        return view('admin.roles.add', [
            'title' => 'Trang thêm mới vai trò'
        ]);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:roles'
        ], [
            'name.required' => 'Vui lòng nhập tên vai trò',
            'name.unique' => 'Tên vai trò đã tồn tại'
        ]);
        $roles = new Role();
        $roles->name = $request->name;
        $roles->save();
        return redirect()->back()->with('success', 'Thành công thêm mới vai trò');
    }

    public function destroy($id)
    {
        $roles = Role::findOrFail($id);
        $roles->delete();
        return redirect()->route('list.role')->with('success', 'Thành công xoá vai trò');
    }
    public function edit($id)
    {
        return view('admin.roles.edit', [
            'title' => "Trang cập nhật vai trò",
            'roles' => Role::findOrFail($id)
        ]);
    }
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => ['required', Rule::unique('roles')->ignore($id)],
        ], [
            'name.required' => 'Vui lòng nhập tên vai trò',
            'name.unique' => 'Tên vai trò đã tồn tại',
        ]);

        $roles = Role::find($id);
        $roles->name = $request->name;
        $roles->save();

        return redirect()->route('list.role')->with('success', 'Thành công cập nhật thể loại ' . $request->name);
    }
}
