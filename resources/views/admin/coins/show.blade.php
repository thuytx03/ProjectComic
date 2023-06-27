@extends('admin.layouts.main')
@section('content')
    <h1>{{ $title }}</h1>

    @if (session('success'))
        <div class="alert alert-success">
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

    <div class="row mt-5 mb-5">
        <h3 class="text-center">Chi tiết hoá đơn</h3>

        <div class="col-lg-6 col-md-6 col-12">
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-12 mt-2">
                    <label for="last_name">Tên </label>
                    <input id="last_name" class="form-control" value="{{ $order_coins->last_name }}" type="text" name="last_name" disabled>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-12 mt-2">
                    <label for="first_name">Họ </label>
                    <input id="first_name" class="form-control" value="{{ $order_coins->first_name }}" type="text" name="first_name" disabled>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-12 mt-2">
                    <label for="email">Email </label>
                    <input id="email" class="form-control" value="{{ $order_coins->email }}" type="email" name="email" disabled>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-12 mt-2">
                    <label for="phone">Phone </label>
                    <input id="phone" class="form-control" value="{{ $order_coins->phone }}" type="text" name="phone" disabled>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-12 mt-2">
                    <label for="coins">Số coins cần nạp </label>
                    <input id="coins" class="form-control" value="{{ $order_coins->coins }}" type="text" name="coins" disabled>

                </div>

                <div class="form-group col-lg-12 col-md-12 col-12 mt-2">
                    <label for="description">Ghi chú</label> <br>
                    <textarea name="description" id="" class="form-control"
                        placeholder="Mã nạp xu của bạn là Email. Vui lòng nhập email vào đây !" disabled>{{ $order_coins->description }}</textarea>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-12 mt-3">
                    <a href="" class="btn btn-primary">Chỉnh sửa</a>
                    <a href="{{ route('list.coins') }}" class="btn btn-success">Danh sách</a>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-12 mt-2">
            <h5>Phương thức thanh toán </h5>
            <div class="row">
                <div class="form-check col-lg-12 col-md-12 col-12 mt-2">
                    <input class="form-check-input" type="radio" name="payment" value="{{ $order_coins->payment }}"
                        id="showInput1"  {{ $order_coins->payment=='Thanh toán qua thẻ ngân hàng' ? 'checked' : '' }} disabled  >
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
                    <input class="form-check-input" type="radio" name="payment" value=" {{ $order_coins->payment }}"
                        id="showInput2" {{ $order_coins->payment=='Thanh toán qua thẻ ngân hàng' ? 'checked' : '' }} disabled >
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
                    <label for="status">Trạng thái thanh toán: <b class="text-primary">{{ $order_coins->status }}</b></label> <br>

                </div>

                <div class="form-group col-lg-12 col-md-12 col-12 mt-2">
                    <label for="image">Hình ảnh chuyển khoản:</label> <br>
                    <img src="{{ $order_coins->image }}" width="90px" alt="" disabled>

                </div>



            </div>

        </div>

    </div>

@endsection
