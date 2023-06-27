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

<div class="container">
    <h3>Lịch sử nạp xu</h3>
@if ($order_coin->count() > 0)

    <div class="container-fluid p-5">
        <div class="row">
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th>Coins</th>
                        <th>Payment</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_coin as $value)
                        <tr>
                            <td scope="row">{{ $value->last_name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->phone }}</td>
                            <td><img src="{{ $value->image }}" width="30px" alt=""></td>
                            <td>{{ $value->coins }}</td>
                            <td>{{ $value->payment }}</td>
                            <td class="text-danger">{{ $value->status }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>



        </div>

    </div>
@else
    <p>Bạn chưa theo dõi truyện nào.</p>
@endif

</div>
@include('client.layouts.footer')
