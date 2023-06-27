@include('client.layouts.header')
@include('client.layouts.sidebar')

<main class="container bg-white">
    <div class="row mb-3">
        <article class="col-lg-3 col-md-12 col-12 mb-4 ">
            <div class="col-6 mx-auto mt-4">
                <img src="https://cdn2.iconfinder.com/data/icons/avatar-flat-6/614/Page_19-512.png" class="img-fluid" alt="">
            </div>
            <h5 class="text-center mt-3">{{ $users->name }}</h5>
            <hr>
            <ul class="list-group">
                <li class="list-group-item"><a href="">Thông tin tài khoản</a></li>
                @if(Auth::user()->role_id==1)
                <li class="list-group-item"><a href="{{ route('admin.home') }}">Trang quản trị</a></li>
                @endif
                <li class="list-group-item"><a href="{{ route('follow.index') }}">Truyện theo dõi</a></li>
                <li class="list-group-item"><a href="{{ route('coins.index') }}">Nạp xu</a></li>
                <li class="list-group-item"><a href="#">Bình luận</a></li>
                <li class="list-group-item"><a href="{{ route('dang-xuat') }}">Đăng xuất</a></li>
            </ul>
        </article>
        <aside class="col-lg-9 col-md-12 col-12  mt-4 pb-5">
            <h3>Thông tin tài khoản</h3>
            <div class="row mt-4">
                <div class="col-lg-6 col-md-6 col-6 mt-3">
                    <p style="margin-bottom: -10px">
                        Họ và tên: {{ $users->name }}
                        <hr>
                    </p>
                </div>
                <div class="col-lg-6 col-md-6 col-6 mt-3">
                    <p style="margin-bottom: -10px">
                        Email: {{ $users->email }}
                        <hr>
                    </p>
                </div>
                <div class="col-lg-6 col-md-6 col-6 mt-3">
                    <p style="margin-bottom: -10px">
                        Số điện thoại: {{ $users->number_phone }}
                        <hr>
                    </p>
                </div>
                <div class="col-lg-6 col-md-6 col-6 mt-3">
                    <p style="margin-bottom: -10px">
                        Giới tính: {{ $users->gender == 1 ? "Nam" : "Nữ" }}
                        <hr>
                    </p>
                </div>
            </div>
            <div class="d-flex justify-content-end gap-1">
                <a href="" class="btn btn-danger text-white">Đổi mật khẩu</a>
                <a href="" class="btn btn-primary text-white">Chỉnh sửa</a>
            </div>
        </aside>

    </div>

</main>


@include('client.layouts.footer')
