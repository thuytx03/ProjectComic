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
        <a href="{{ route('add.role') }}" class="btn btn-success">Create</a>
    </div>

    <table class="table table-striped table-hover text-center">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên thể loại</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->name }}</td>

                <td>
                    <form action="/admin/roles/destroy/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Bạn có chắc muốn xoá vai trò {{ $item->name }}')" class="btn btn-danger"><i class='bx bx-trash'></i></button>
                        <a href="/admin/roles/edit/{{ $item->id }}" class="btn btn-primary"><i class='bx bx-edit'></i></a>
                    </form>

                </td>
            </tr>
            @endforeach

        </tbody>
      </table>
      {{ $roles->links() }}
@endsection
