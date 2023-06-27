 <!-- Sidebar -->
 {{-- <nav class="nav">
    <i class="uil uil-bars navOpenBtn"></i>
    <a href="{{ route('trang-chu') }}" class="logo">Xuân Thuỷ </a>

    <ul class="nav-links" style="margin-bottom: 0rem; padding-left: 0rem">
        <i class="uil uil-times navCloseBtn"></i>
        <li><a href="{{ route('trang-chu') }}">Trang chủ</a></li>
        <li><a href="#">Thể loại</a></li>
        <li><a href="#">Xếp hạng</a></li>
        <li><a href="#">Liên hệ</a></li>
        @if (Auth::check())
        <li><a href="">Đã đăng nhập</a></li>
        @else
        <li><a href="#"> Đăng ký</a></li>
        <li><a href="{{ url('/dang-nhap') }}"> Đăng nhập</a></li>
        @endif
    </ul>

    <i class="uil uil-search search-icon" id="searchIcon"></i>
    <div class="search-box">
        <i class="uil uil-search search-icon"></i>
        <input type="text" placeholder="Search here..." />
    </div>
</nav> --}}
 <!-- End SideBar -->
 <div class="container-fluid">
     <header class=" mb-lg-1 mb-2">
         <div class="row ">
             <div class="logo col-lg-3 col-md-3 col-4 mt-3 mt-lg-2 mt-md-3 ">
                 <a href="{{ route('trang-chu') }}"><img src="https://www.toptruyenvip.com/images/logo/top-truyen.png"
                         alt="" class="img-fluid" id="logo"></a>
             </div>
             <div class="col-lg-1 col-md-1 col-2 m-3 pt-2 text-center    ">
                 <div>
                     <input type="checkbox" class="checkbox" id="chk" />
                     <label class="label" for="chk">
                         <i class="fas fa-moon"></i>
                         <i class="fas fa-sun"></i>
                         <div class="ball"></div>
                     </label>
                 </div>
             </div>

             <div class="search-form col-lg-6 col-md-6 col-5  mt-3">
                 <form action="{{ route('trang-chu') }}" class="d-flex " role="search" method="GET">
                     <input class="form-control me-2 search-input search-input " name="search" type="search" placeholder="Search"
                         aria-label="Search">
                     <button class="btn btn-outline-white ml-2 search-button" type="submit">
                         <i class="bi bi-search text-white"></i>
                     </button>
                 </form>
             </div>

         </div>
     </header>
     <nav class="navbar navbar-expand-lg bg-body-tertiary">
         <div class="container-fluid">
             {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                 data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                 aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                     <li class="nav-item active">
                         <a class="nav-link" href="{{ route('trang-chu') }}">Trang chủ <span
                                 class="sr-only">(current)</span></a>
                     </li>


                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                             aria-expanded="false">
                             Thể loại
                         </a>
                         <ul class="dropdown-menu ">
                             @foreach ($genres as $value)
                                 <li><a class="dropdown-item" href="#">{{ $value->name }}</a></li>
                             @endforeach
                         </ul>
                     </li>

                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('coins.index') }}">Nạp xu</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#">Lịch sử</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('follow.index') }}">Theo dõi</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#">Xếp hạng</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#">Con trai</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#">Con gái</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#">Liên hệ</a>
                     </li>

                 </ul>

             </div>
             @if (Auth::check())
                 <a class="nav-link " href="#"><i class="fa-solid fa-coins"></i> Coins: <strong
                         class="text-danger">{{ number_format(Auth::user()->coins, 0, ',', '.') }}</strong>
                 </a>
                 <div class="btn-group dropstart ">
                     <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                         <img src="https://cdn2.iconfinder.com/data/icons/avatar-flat-6/614/Page_19-512.png"
                             width="30" alt="">
                     </button>
                     <div class="dropdown-menu">
                         <li><a class="dropdown-item" href="{{ route('thong-tin-ca-nhan') }}">Thông tin cá nhân</a></li>
                         @if (Auth::user()->role_id == 1)
                             <li><a class="dropdown-item" href="{{ route('admin.home') }}">Trang quản trị</a></li>
                         @endif
                         <li><a class="dropdown-item" href="{{ route('follow.index') }}">Truyện theo dõi</a></li>
                         <li><a class="dropdown-item" href="{{ route('coins.show') }}">Lịch sử nạp xu</a></li>
                         <li><a class="dropdown-item" href="{{ route('coins.show') }}">Lịch sử đọc truyện</a></li>
                         <li><a class="dropdown-item" href="{{ route('dang-xuat') }}">Đăng xuất</a></li>
                     </div>
                 </div>
             @else
                 <div class="">
                     <div class=" d-flex justify-content-end ">

                         <a href="{{ route('dang-ky') }}" class="btn "><i
                                 class="fa-solid fa-right-to-bracket"></i> Đăng ký</a>
                         <a href="{{ route('dang-nhap') }}" class="btn  mr-2"><i
                                 class="fa-solid fa-right-to-bracket"></i> Đăng nhập</a>

                     </div>
                 </div>
             @endif
         </div>
     </nav>



 </div>
