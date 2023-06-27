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

        <form action="{{ route('saveAdd.chapter') }}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="my-input">Tên truyện</label>
                <select name="comic_id" id="" class="form-select">
                    <option value="">Vui lòng chọn tên truyện</option>
                    @foreach($comics as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="my-input">Tiêu đề</label>
                <input id="my-input" class="form-control" type="text" name="name" placeholder="Vui lòng nhập tiêu đề" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="my-input">Chapter</label>
                <input id="my-input" class="form-control"  type="text" name="number_chapter" placeholder="Vui lòng nhập chapter" value="{{ old('number_chapter') }}">
            </div>
            <div class="form-group image-container">
                <label for="my-input">Ảnh chapter</label>
                <input id="images" class="form-control" type="file" name="images[]" multiple >
                {{-- <img id="preview-image" class="mt-3" src="#" alt="Ảnh sản phẩm" style="max-width: 200px;"> --}}

            </div>
            <div class="form-group">
                <label for="my-input">Coins</label>
                <input id="my-input" class="form-control"  type="text" name="coin_required" placeholder="Vui lòng nhập coins" value="0">
            </div>
            <div class="form-group mt-3">
                <label for="my-input">Trạng thái: </label>
                <input id="my-input" class="" type="radio" name="status" value="1" {{ old('status')==1 ? "checked" : "" }}> Công khai
                <input id="my-input" class="" type="radio" name="status" value="2"  {{ old('status')==2 ? "checked" : "" }}> Không công khai
            </div>
            <div class="form-group mt-3">
                @csrf
               <button type="submit" class="btn btn-primary">Thêm mới</button>
               <button type="reset" class="btn btn-danger">Nhập lại</button>
                <a href="{{ route('list.chapter') }}" class="btn btn-success">Danh sách</a>
            </div>
        </form>
        <style>
            .image-preview{
                margin:15px 10px 0px 0px;
                width: 100px;
            }
        </style>

@endsection
