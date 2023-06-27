@include('client.layouts.header')
@include('client.layouts.sidebar')

<div class="container bg-white">
    <div class="row pt-4 pb-4">
        <form action="{{ route('save-dang-nhap') }}" method="POST">
            @csrf
            <div class="col-lg-6 col-md-6 col-12 mx-auto">
                <h1>Đăng nhập</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <div class="form-group ">
                    <label for="my-input">Email</label>
                    <input id="my-input" class="form-control" type="text" name="email" placeholder="Email"
                        value="{{ old('email') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="my-input">Mật khẩu</label>
                    <input id="my-input" class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="d-flex justify-content-between mt-3 ">
                    <label for=""> <input id="my-input" class="" type="checkbox"> Ghi nhớ </label>
                    <button type="submit" class="btn btn-warning w-25 text-white">Đăng nhập</button>
                </div>
                <div class="mt-3">
                    <a href="" class="btn btn-facebook form-control "><i class="fa-brands fa-facebook-f"></i>
                        Đăng nhập bẳng Facebook</a>
                </div>
                <div class="mt-2">
                    <a href="" class="btn btn-google form-control"><i class="fa-brands fa-google"></i> Đăng nhập
                        bẳng Google</a>
                </div>
                <div class="mt-2">
                    <a href="" class="text-primary">Đăng ký thành viên mới</a>
                </div>
                <div class="mt-2">
                    <p class="text-danger">
                        *Lưu ý: Sử dụng đăng nhập bằng Google để trải nghiệm đọc truyện được tốt nhất.
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>

@include('client.layouts.footer')
