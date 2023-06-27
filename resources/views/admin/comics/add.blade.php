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

    <form action="{{ route('saveAdd.comic') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="my-input">Tên truyện</label>
            <input id="my-input" class="form-control" type="text" name="name" placeholder="Vui lòng nhập tên truyện"
                value="{{ old('name') }}">
        </div>
        <div class="form-group mt-3">
            <label >Ảnh bìa</label>
            <input class="form-control" type="file" name="cover_image" id="cover_image">
            <img id="preview-image" class="mt-3" src="#" alt="Ảnh sản phẩm" style="max-width: 200px;">
        </div>
        <div class="form-group mt-3">
            <label for="my-input">Thể loại truyện:</label>
            @foreach ($genres as $genre)
                <input id="my-input" type="checkbox" name="genre_id[]"
                    value="{{ $genre->id }}" {{ old('genre_id') }}>{{ $genre->name }}
            @endforeach
        </div>
        <div class="form-group mt-3">
            <label for="my-input">Tác giả</label>
            <input id="my-input" class="form-control" type="text" name="author" placeholder="Vui lòng nhập tên tác giả"
                value="{{ old('name') }}">
        </div>
        {{-- <div class="form-group mt-3">
            <label for="my-input">Truyện vip?</label>
            <input  class="" type="checkbox" id="showInput" name="vip" value="1" {{ old('vip')==1 ? "checked" :"" }}>
        </div>
        <div class="form-group" id="textInput" style="display: none;">
            <input type="text" class="form-control" placeholder="Vui lòng nhập giá" value="{{ old('price') }}" name="price">
          </div> --}}

          <div class="form-group mt-3">
            <label for="">Mô tả chi tiết</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
          </div>


        <div class="form-group mt-3">
            <label for="my-input">Trạng thái: </label>
            <input id="my-input" class="" type="radio" name="status" value="1"
                {{ old('status') == 1 ? 'checked' : '' }}> Công khai
            <input id="my-input" class="" type="radio" name="status" value="2"
                {{ old('status') == 2 ? 'checked' : '' }}> Không công khai
        </div>
        <div class="form-group mt-3">
            @csrf
            <button type="submit" class="btn btn-primary">Thêm mới</button>
            <button type="reset" class="btn btn-danger">Nhập lại</button>
            <a href="{{ route('list.comic') }}" class="btn btn-success">Danh sách</a>
        </div>
    </form>
   
@endsection
