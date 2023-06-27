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

        <div class="d-flex justify-content-end mt-3 mb-3">
            <a href="{{ route('add.user') }}" class="btn btn-success">Create</a>
        </div>

        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ và tên</th>
                    <th>Vai trò</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Giới tính</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->role->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->number_phone }}</td>
                    <td>{{ $item->gender==1? 'Nam' : 'Nữ' }}</td>
                    <td>{{ $item->status==1 ? "Đang hoạt động" : "Không hoạt động" }} </td>
                    <td>
                        <form action="/admin/users/destroy/{{ $item->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Bạn có chắc muốn xoá thể loại {{ $item->name }}')" class="btn btn-danger"><i class='bx bx-trash'></i></button>
                            <a href="/admin/users/edit/{{ $item->id }}" class="btn btn-primary"><i class='bx bx-edit'></i></a>
                        </form>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        {{ $users->links() }}
@endsection
