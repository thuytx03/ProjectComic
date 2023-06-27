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

        <form action="{{ route('saveAdd.genre') }}" method="post">
            <div class="form-group">
                <label for="my-input">Tên thể loại</label>
                <input id="my-input" class="form-control" type="text" name="name" placeholder="Vui lòng nhập tên thể loại" value="{{ old('name') }}">
            </div>
            <div class="form-group mt-3">
                <label for="my-input">Trạng thái: </label>
                <input id="my-input" class="" type="radio" name="status" value="1" {{ old('status')==1 ?     "checked" : "" }}> Công khai
                <input id="my-input" class="" type="radio" name="status" value="2"  {{ old('status')==2 ? "checked" : "" }}> Không công khai
            </div>
            <div class="form-group mt-3">
                @csrf
               <button type="submit" class="btn btn-primary">Thêm mới</button>
               <button type="reset" class="btn btn-danger">Nhập lại</button>
                <a href="{{ route('list.genre') }}" class="btn btn-success">Danh sách</a>
            </div>
        </form>

@endsection
