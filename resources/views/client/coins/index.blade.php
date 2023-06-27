@include('client.layouts.header')
@include('client.layouts.sidebar')
@if (session('success'))
    <div class="alert alert-primary">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<h3 class="text-center">Bảng giá nạp XU</h3>
<h4 class="text-center">Nạp XU bằng thanh toán trực tuyến, Paypal, Momo</h4>

<div class="container">
    <p>Nạp XU online là cách hiệu quả nhất và nhanh nhất để có XU trong tài khoản của bạn.
        Bạn cần có thẻ ngân hàng, thẻ tín dụng, tài khoản Paypal hoặc sử dụng ví điện tử MOMO để có thể nạp XU online.
        Hãy chọn các gói XU muốn mua trong danh sách dưới đây và tiến hành thanh toán.</p>
    <div class="row">

        <div class=" col-md-3 col-6 text-center ">
            <div class=""><img src="{{ asset('client/images/goixuvangvang1.jpg') }}" class="img-fluid"
                    alt=""></div>
            <p class="">
                <a href="" class="text-hover ">Gói 20.000 Xu</a> <br>
                <a href="" class="text-primary text-hover">20.000 VNĐ</a> <br>
        </div>
        <div class=" col-md-3 col-6 text-center ">
            <div class=""><img src="{{ asset('client/images/goixuvangvang2.jpg') }}" class="img-fluid"
                    alt=""></div>
            <p class="">
                <a href="" class="text-hover ">Gói 50.000 Xu</a> <br>
                <a href="" class="text-primary text-hover">50.000 VNĐ</a> <br>
            </p>
        </div>
        <div class=" col-md-3 col-6 text-center ">
            <div class=""><img src="{{ asset('client/images/goixuvangvang3.jpg') }}" class="img-fluid"
                    alt=""></div>
            <p class="">
                <a href="" class="text-hover ">Gói 100.000 Xu</a> <br>
                <a href="" class="text-primary text-hover">100.000 VNĐ</a> <br>
            </p>
        </div>

        <div class="col-md-3 col-6 text-center ">
            <div class=""><img src="{{ asset('client/images/goixuvangvang4.jpg') }}" class="img-fluid"
                    alt=""></div>

                <p class="">
                    <a href="" class="text-hover ">Gói 200.000 Xu</a> <br>
                    <a href="" class="text-primary text-hover">200.000 VNĐ</a> <br>
                </p>

        </div>
    </div>


    <form action="/saveCoins" method="post"  enctype="multipart/form-data">

        <div class="row mt-5 mb-5">
            <h3 class="text-center">Nạp XU</h3>

            <div class="col-lg-6 col-md-6 col-12">
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6 col-12 mt-2">
                        <label for="last_name">Tên </label>
                        <input id="last_name" class="form-control" type="text" name="last_name">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-12 mt-2">
                        <label for="first_name">Họ </label>
                        <input id="first_name" class="form-control" type="text" name="first_name">
                    </div>
                    <div class="form-group col-lg-12 col-md-12 col-12 mt-2">
                        <label for="email">Email </label>
                        <input id="email" class="form-control" type="email" name="email">
                    </div>
                    <div class="form-group col-lg-12 col-md-12 col-12 mt-2">
                        <label for="phone">Phone </label>
                        <input id="phone" class="form-control" type="text" name="phone">
                    </div>
                    <div class="form-group col-lg-12 col-md-12 col-12 mt-2">
                        <label for="coins">Số coins cần nạp </label>
                        <select name="coins" id="coins" class="form-select">
                            <option value="">Vui lòng chọn</option>
                            <option value="20000">20,000 xu</option>
                            <option value="50000">50,000 xu</option>
                            <option value="100000">100,000 xu</option>
                            <option value="200000">200,000 xu</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-12 mt-2">
                        <label for="description">Ghi chú</label> <br>
                        <textarea name="description" id="description" class="form-control"
                            placeholder="Mã nạp xu của bạn là Email. Vui lòng nhập email vào đây !"></textarea>
                    </div>
                    <div class="form-group col-lg-12 col-md-12 col-12 mt-2">
                        @csrf
                        <button type="submit" class="btn btn-primary">Nạp xu</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <h5>Phương thức thanh toán </h5>
                <div class="row">
                    <div class="form-check col-lg-12 col-md-12 col-12 mt-2">
                        <input class="form-check-input" type="radio" name="payment" value="Thanh toán qua thẻ ngân hàng" id="showInput1">
                        <label class="form-check-label" for="showInput1">
                            Thanh toán qua thẻ ngân hàng
                        </label>
                    </div>
                    <div class="form-group col-lg-12 col-md-12 col-12" id="textInput1" style="display: none;">
                        <div class="row">
                            <div class="col-6">
                                <img src="{{ asset('client/images/mbbank.jpg') }}" class="w-100" alt="">
                            </div>
                            <div class="col-6">
                                <p class="text-danger">MB Bank</p>
                                <p class="text-danger">STK: 0387976086</p>
                                <p class="text-danger">Tên: Trịnh Xuân Thuỷ</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-check col-lg-12 col-md-12 col-12 mt-2">
                        <input class="form-check-input" type="radio" name="payment" value=" Thanh toán qua ví MOMO" id="showInput2">
                        <label class="form-check-label" for="showInput2">
                            Thanh toán qua ví MOMO
                        </label>
                    </div>
                    <div class="form-group" id="textInput2" style="display: none;">
                        <div class="row">
                            <div class="col-6">
                                <img src="{{ asset('client/images/momo.jpg') }}" class="w-100" alt="">
                            </div>
                            <div class="col-6">
                                <p class="text-danger">MOMO</p>
                                <p class="text-danger">STK: 0387976086</p>
                                <p class="text-danger">Tên: Trịnh Xuân Thuỷ</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-12 mt-2">
                        <label for="image">Hình ảnh chuyển khoản</label> <br>
                        <input class="form-control" type="file" name="image" id="image">
                        <img id="preview-image" class="mt-3" src="#" alt="Ảnh chuyển khoản" style="max-width: 200px;">

                    </div>


                </div>

            </div>

        </div>
    </form>
</div>



@include('client.layouts.footer')
