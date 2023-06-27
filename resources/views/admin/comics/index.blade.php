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
        <a href="{{ route('add.comic') }}" class="btn btn-success">Create</a>
    </div>

    <table class="table table-striped table-hover text-center ">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên truyện</th>
                <th>Ảnh bìa</th>
                <th>Tác giả</th>
                <th>Trạng thái</th>
                <th>Yêu thích</th>
                <th>Lượt xem</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comics as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td><img src="{{ asset('storage/'.$item->cover_image) }}" width="50" alt=""></td>
                    <td>{{ $item->author }}</td>

                    <td>{{ $item->status == 1 ? 'Công khai' : 'Không công khai' }} </td>
                    <td>{{ $item->like }}</td>
                    <td>{{ $item->view }}</td>
                    <td>
                        <form action="/admin/comic/destroy/{{ $item->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Bạn có chắc muốn xoá truyện {{ $item->name }}')"
                                class="btn btn-danger w-75"><i class='bx bx-trash'></i></button>
                            <a href="/admin/comic/edit/{{ $item->id }}" class="btn btn-primary w-75 mt-2"><i class='bx bx-edit'></i></a>
                        </form>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{-- <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Tên truyện</th>
                        <th>Ảnh bìa</th>
                        <th>Tác giả</th>
                        <th>Vip</th>
                        <th>Giá</th>
                        <th>Trạng thái</th>
                        <th>Yêu thích</th>
                        <th>Lượt xem</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($comics as $key => $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ $item->status == 1 ? 'Công khai' : 'Không công khai' }} </td>
                            <td></td>
                            <td></td>

                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div> --}}



    {{ $comics->links() }}
@endsection
