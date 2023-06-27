@extends('admin.layouts.main')
@section('content')
    <h1>{{ $title }}</h1>
    @if (session('success'))
        <div class="alert alert-primary">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

        <form action="{{ route('saveAdd.user') }}" method="post">
            <div class="form-group mt-3">
                <label for="my-input">Họ và tên</label>
                <input id="my-input" class="form-control" type="text" name="name" placeholder="Vui lòng nhập họ và tên" value="{{ old('name') }}">
            </div>
            <div class="form-group mt-3">
                <label for="my-input">Vai trò</label>
                <select name="role_id" id="" class="form-select">
                    <option value="">Vui lòng chọn!</option>
                    @foreach($roles as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="my-input">Email</label>
                <input id="my-input" class="form-control" type="text" name="email" placeholder="Vui lòng nhập email" value="{{ old('email') }}">
            </div>
            <div class="form-group mt-3">
                <label for="my-input">Số điện thoại</label>
                <input id="my-input" class="form-control" type="text" name="number_phone" placeholder="Vui lòng nhập số điện thoại" value="{{ old('number_phone') }}">
            </div>
            <div class="form-group mt-3">
                <label for="my-input">Mật khẩu</label>
                <input id="my-input" class="form-control" type="password" name="password" placeholder="Vui lòng nhập mật khẩu" >
            </div>
            <div class="form-group mt-3">
                <label for="my-input">Nhập lại mật khẩu</label>
                <input id="my-input" class="form-control" type="password" name="enter_password" placeholder="Vui lòng nhập lại mật khẩu" >
            </div>
            <div class="form-group mt-3">
                <label for="my-input">Giới tính: </label>
                <input id="my-input" class="" type="radio" name="gender" value="1" {{ old('gender')==1 ? "checked" : "" }}> Nam
                <input id="my-input" class="" type="radio" name="gender" value="2"  {{ old('gender')==2 ? "checked" : "" }}> Nữ
            </div>
            <div class="form-group mt-3">
                <label for="my-input">Trạng thái: </label>
                <input id="my-input" class="" type="radio" name="status" value="1" {{ old('status')==1 ? "checked" : "" }}> Hoạt động
                <input id="my-input" class="" type="radio" name="status" value="2"  {{ old('status')==2 ? "checked" : "" }}> Không hoạt động
            </div>
            <div class="form-group mt-3">
                @csrf
               <button type="submit" class="btn btn-primary">Thêm mới</button>
               <button type="reset" class="btn btn-danger">Nhập lại</button>
                <a href="{{ route('list.user') }}" class="btn btn-success">Danh sách</a>
            </div>
        </form>

@endsection
