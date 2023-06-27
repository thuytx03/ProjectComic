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
        <a href="{{ route('add.coins') }}" class="btn btn-success">Create</a>
    </div>

    <table class="table table-striped table-hover text-center">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>Ảnh</th>
                <th>Coins</th>
                <th>Thanh toán</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order_coins as $key => $item)
                <tr>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td><img src="{{ $item->image }}" width="30" alt=""></td>
                    <td>{{ $item->coins }}</td>
                    <td>{{ $item->payment }}</td>
                    @if ($item->status == 'Chờ xác nhận')
                        <td class="text-warning">{{ $item->status }}</td>
                    @elseif($item->status == 'Đã xác nhận')
                        <td class="text-success">{{ $item->status }}</td>
                    @elseif($item->status == 'Đã huỷ')
                        <td class="text-danger">{{ $item->status }}</td>
                    @endif
                    <td>
                        @if ($item->status == 'Chờ xác nhận')
                            <div class="dropdown">
                                <button class="btn " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-screwdriver-wrench"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li> <a href="{{ route('show.coins', ['id' => $item->id]) }}" class="dropdown-item">Xem chi tiết</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('confirm.coins', ['id' => $item->id]) }}">Xác
                                            nhận hoá đơn</a></li>
                                    <li><a class="dropdown-item" href="{{ route('cancel.coins', ['id' => $item->id]) }}">Huỷ hoá đơn</a></li>
                                </ul>
                            </div>
                        @else
                            <div class="dropdown">
                                <button class="btn " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-screwdriver-wrench"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li> <a href="{{ route('show.coins', ['id' => $item->id]) }}" class="dropdown-item">Xem chi tiết</a></li>

                                </ul>
                            </div>
                        @endif
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $order_coins->links() }}
@endsection
