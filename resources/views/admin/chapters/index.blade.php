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
        <a href="{{ route('add.chapter') }}" class="btn btn-success">Create</a>
    </div>

    <table class="table table-striped table-hover text-center">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên truyện</th>
                <th>Chapter</th>
                <th>Tiêu đề</th>
                <th>Số ảnh</th>
                <th>Coins</th>
                <th>Lượt xem</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chapters as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->comic->name }}</td>
                    <td>Chap {{ $item->number_chapter }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        @foreach ($chapterImageCounts as $chapterImageCount)
                            @if ($chapterImageCount->chapter_id == $item->id)
                                {{ $chapterImageCount->count }}
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $item->coin_required }}</td>
                    <td>{{ $item->view }}</td>

                    <td>{{ $item->status == 1 ? 'Công khai' : 'Không công khai' }} </td>
                    <td>
                        <form action="/admin/chapter/destroy/{{ $item->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Bạn có chắc muốn xoá chapter {{ $item->name }}')"
                                class="btn btn-danger w-75"><i class='bx bx-trash'></i></button>
                            <a href="/admin/chapter/edit/{{ $item->id }}" class="btn btn-primary w-75 mt-2"><i class='bx bx-edit'></i></a>
                        </form>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $chapters->links() }}
@endsection
