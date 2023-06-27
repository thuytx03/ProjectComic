<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $user = User::paginate(5);
        return view('admin.users.index', [
            'title' => 'Quản lý tài khoản',
            'users' => $user
        ]);
    }

    public function create()
    {
        return view('admin.users.add', [
            'title' => 'Thêm mới tài khoản',
            'roles' => Role::all()
        ]);
    }
    public function store(Request $request)
    {
        $user = new User();
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'role_id' => 'required',
            'number_phone' => 'required',
            'password' => 'required',
            'enter_password' => 'required',
            'gender' => 'required',
            'status' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập họ và tên',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại',
            'role_id.required' => 'Vui lòng nhập vai trò',
            'number_phone.required' => 'Vui lòng nhập số điện thoại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'enter_password.required' => 'Vui lòng nhập lại mật khẩu',
            'gender.required' => 'Vui lòng nhập giới tính',
            'status.required' => 'Vui lòng nhập trạng thái',
        ]);

        if ($request->password == $request->enter_password) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role_id = $request->role_id;
            $user->number_phone = $request->number_phone;
            $user->password = bcrypt($request->password);
            $user->gender = $request->gender;
            $user->status = $request->status;
            $user->save();
            return redirect()->back()->with('success', 'Thêm mới tài khoản thành công!');
        } else {
            return redirect()->back()->withErrors([
                'password' => 'Mật khẩu không trùng khớp'
            ]);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Xoá tài khoản thành công');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', [
            'title' => 'Chỉnh sửa tài khoản',
            'users' => $user,
            'roles' => Role::all()
        ]);
    }
    public function update($id, Request $request)
    {

        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required', Rule::unique('users')->ignore($id),
            'role_id' => 'required',
            'number_phone' => 'required',
            'password' => 'required',
            'enter_password' => 'required',
            'gender' => 'required',
            'status' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập họ và tên',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại',
            'role_id.required' => 'Vui lòng nhập vai trò',
            'number_phone.required' => 'Vui lòng nhập số điện thoại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'enter_password.required' => 'Vui lòng nhập lại mật khẩu',
            'gender.required' => 'Vui lòng nhập giới tính',
            'status.required' => 'Vui lòng nhập trạng thái',
        ]);

        if ($request->password == $request->enter_password) {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role_id = $request->role_id;
            $user->number_phone = $request->number_phone;
            $user->password = bcrypt($request->password);
            $user->gender = $request->gender;
            $user->status = $request->status;
            $user->save();
            return redirect()->back()->with('success', 'Chỉnh sửa tài khoản thành công!');
        } else {
            return redirect()->back()->withErrors([
                'password' => 'Mật khẩu không trùng khớp'
            ]);
        }
    }
}
