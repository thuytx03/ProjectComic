@include('client.layouts.header')

@include('client.layouts.sidebar')
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button> --}}
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="d-flex justify-content-end m-2">
                {{-- <h1 class="modal-title fs-5" id="exampleModalLabel">Chào mừng </h1> --}}
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center h-100">
                <img src="https://i.pinimg.com/originals/b0/06/7a/b0067ade5e832d2aefec8ee9bda50fdc.gif" class=""
                    style=" width: 20%;  ">
            </div>

            <span class="text-center">
                💗 Cảm ơn bạn đã ghé thăm trang web của mình 💗
            </span>
            <span class="m-1">
                😍 Tại đây các bạn có thể đọc những bộ truyện tranh <strong class="text-danger">HOT</strong> nhất hiện nay
                và nạp xu để có thể đọc trước những bộ truyện <strong class="text-danger">VIP</strong> mới nhất.
            </span>
            <span class="m-1">
                🐌 Liên hệ nếu nạp xu lỗi: <a href="" class="text-danger">Tại đây</a>
            </span>
            <span class="m-1">
                🐌 Liên hệ hợp tác đăng truyện: <a href="" class="text-danger">Tại đây</a>
            </span>
            <span class="m-1 mb-5 ">
                🐌 Tham gia cộng đồng Mọt truyện: <a href="" class="text-danger">Tại đây</a>
            </span>
        </div>
    </div>
</div>
<!-- Banner -->
<div class="container-fluid ">
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('client/images/anh1.jfif') }}" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="{{ asset('client/images/anh2.jfif') }}" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="{{ asset('client/images/anh3.jfif') }}" class="d-block w-100" alt="..." />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- End Banner -->

<section class=" home-content">
    @yield('home-content')

</section>


@include('client.layouts.footer')
