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

    <form action="/admin/comic/update/{{ $comics->id }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="my-input">Tên truyện</label>
            <input id="my-input" class="form-control" type="text" name="name" placeholder="Vui lòng nhập tên truyện"
                value="{{ $comics->name }}">
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
                  @if(in_array($genre->id, $genre_comics->pluck('genre_id')->toArray())) checked @endif value="{{ $genre->id }}">{{ $genre->name }}
        @endforeach
        </div>
        <div class="form-group mt-3">
            <label for="my-input">Tác giả</label>
            <input id="my-input" class="form-control" type="text" name="author" placeholder="Vui lòng nhập tên tác giả"
                value="{{ $comics->author }}">
        </div>
        {{-- <div class="form-group mt-3">
            <label for="my-input">Truyện vip?</label>
            <input  class="" type="checkbox" id="showInput" name="vip" value="1" {{ $comics->vip==1 ? "checked" :"" }}>
        </div>
        <div class="form-group" id="textInput" style="display: none;">
            <input type="text" class="form-control" placeholder="Vui lòng nhập giá" value="{{$comics->price }}" name="price">
          </div> --}}

          <div class="form-group mt-3">
            <label for="">Mô tả chi tiết</label>
            <textarea name="description" id="description" class="form-control">{{ $comics->description }}</textarea>
          </div>


        <div class="form-group mt-3">
            <label for="my-input">Trạng thái: </label>
            <input id="my-input" class="" type="radio" name="status" value="1"
                {{ $comics->status == 1 ? 'checked' : '' }}> Công khai
            <input id="my-input" class="" type="radio" name="status" value="2"
                {{ $comics->status == 2 ? 'checked' : '' }}> Không công khai
        </div>
        <div class="form-group mt-3">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <button type="reset" class="btn btn-danger">Nhập lại</button>
            <a href="{{ route('list.comic') }}" class="btn btn-success">Danh sách</a>
        </div>
    </form>
    <script>
        const showInput = document.querySelector('#showInput');
        const textInput = document.querySelector('#textInput');

        showInput.addEventListener('click', function() {
          if (showInput.checked) {
            textInput.style.display = 'block';
          } else {
            textInput.style.display = 'none';
          }
        });
      </script>
@endsection
