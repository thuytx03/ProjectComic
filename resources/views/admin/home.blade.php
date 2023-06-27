@extends('admin.layouts.main')

@section('content') 
    <div class="row">
        <h2 class="text-center">Chào mừng bạn đến với giao diện quản trị website </h2>
        <br>
        <h3 class="text-center">Tại đây bạn có thể quản lý website tại mục lục</h3>
        <br>
        <h4 class="text-center">Chi tiết mục lục</h4>
        <br>
        <div class="d-flex justify-content-center">
            <ul class="navbar-nav  ">
                <li class="nav-item active navHome  ">
                    <a class="nav-link" href="listPosition">- Thể loại - Quản lý thể loại</a>
                </li>
                <li class="nav-item active navHome">
                    <a class="nav-link" href="listDepartment">- Truyện - Quản lý truyện</a>
                </li>
                <li class="nav-item active navHome">
                    <a class="nav-link" href="listStaff">- Bình luận - Quản lý bình luận</a>
                </li>
                <li class="nav-item active navHome">
                    <a class="nav-link" href="listSalary">- Tài khoản - Quản lý tài khoản</a>
                </li>
                <li class="nav-item active navHome">
                    <a class="nav-link" href="listAccount">- Hoá đơn - Quản lý hoá đơn</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
