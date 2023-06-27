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
<div class="container-fluid bg-white">
    <div class="row mt-5 mb-5 content-comic-detail">
        <div class="col-lg-2 col-12 mt-5 mb-4  text-center  ">
            <img src="{{ asset('storage/' . $comic->cover_image) }}" alt="" class="img-fluid rounded">
        </div>
        <div class="col-lg-9 col-12 mt-5  ">
            <h4 class="text-lg-start text-center">{{ $comic->name }}</h4>
            <p class="pt-2 content-comic-detail ">
                @foreach ($genre_comics as $value)
                    @if ($value->comic_id == $comic->id)
                        <a href="" class="btn btn-outline-orange text-orange mb-2">{{ $value->genre->name }}</a>
                    @endif
                @endforeach
            </p>
            <p class="content-comic-detail "><i class="fa-solid fa-signal"></i> Tình trạng: Đang tiến hành</p>
            <p class="content-comic-detail "><i class="fa-solid fa-spinner"></i> Cập nhật : 8 giờ trước</p>
            <p class="content-comic-detail "><i class="fa-solid fa-eye"></i> Lượt xem : {{ $totalViews }}</p>
            <p class="content-comic-detail "><i class="fa-solid fa-bookmark"></i> Lượt theo dõi: 100</p>
            {{-- @php
                $user = auth()->user();
                $following = $user ? $user->following($comic->id) : false;
            @endphp

            @if ($following)
                <form action="{{ route('follow.destroy', $comic->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hủy theo dõi</button>
                </form>
            @else
                <form action="{{ route('follow.comic', $comic->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">Theo dõi</button>
                </form>
            @endif --}}


            <p class="content-comic-detail ">
                @php
                    $user = auth()->user();
                    $following = $user ? $user->following($comic->id) : false;
                @endphp

                @if ($following)
                    <form action="{{ route('follow.destroy', $comic->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="" class="btn btn-success text-white col-lg-2 col-5 mb-2 ">Đọc từ đầu</a>
                        <button type="submit" class="btn btn-danger text-white col-lg-2 col-5 mb-2">Hủy theo
                            dõi</button>
                        <a href="" class="btn btn-warning text-white col-lg-2 col-5 mb-2">Báo lỗi</a>
                        <a href="" class="btn btn-secondary text-white col-lg-2 col-5 mb-2">Share</a>
                    </form>
                @else
                    <form action="{{ route('follow.comic', $comic->id) }}" method="post">
                        @csrf
                        <a href="" class="btn btn-success text-white col-lg-2 col-5 mb-2 ">Đọc từ đầu</a>
                        <button type="submit" class="btn btn-primary text-white col-lg-2 col-5 mb-2">Theo
                            dõi</button>
                        <a href="" class="btn btn-danger text-white col-lg-2 col-5 mb-2">Báo lỗi</a>
                        <a href="" class="btn btn-secondary text-white col-lg-2 col-5 mb-2">Share</a>
                    </form>
                @endif

            </p>
        </div>
    </div>
    <div class="col-12 ">
        <h5 class="text-orange"><i class="fa-solid fa-star"></i> Giới thiệu</h5>
        <p><?= $comic->description ?></p>
    </div>



    <div class="col-12">
        <h5 class="text-orange"><i class="fa-solid fa-bars"></i></i> Danh sách chương</h4>
            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-12 mb-4">

                    <!-- Exaple 1 -->
                    <div class="card example-1 scrollbar-deep-purple bordered-deep-purple thin">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 text-center ">
                                    <p class="fw-bold">Chapter</p>
                                </div>
                                <div class="col-4 text-center">
                                    <p class="fw-bold">Cập nhật</p>
                                </div>
                                <div class="col-4 text-center">
                                    <p class="fw-bold">Lượt xem</p>
                                </div>
                                <hr>
                                @foreach ($chapters as $chapter)
                                    <div class="col-4 text-center">
                                        @if (Auth::check() && Auth::user()->chapters->contains($chapter))
                                            <a href="{{ route('chapter.detail', ['slug' => $comic->slug, 'id' => $comic->id, 'chapter_id' => $chapter->id]) }}"
                                                class="text-dark text-hover chapter">
                                                Chap {{ $chapter->number_chapter }}
                                            </a>
                                        @elseif ($chapter->coin_required > 0)
                                            <form method="GET"
                                                action="{{ route('chapter.detail', ['slug' => $comic->slug, 'id' => $comic->id, 'chapter_id' => $chapter->id]) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-orange text-orange "
                                                    style="margin-top:-7px;"><i class="fa-solid fa-unlock"></i>
                                                    Chap {{ $chapter->number_chapter }}
                                                    ({{ $chapter->coin_required }} Coins)
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('chapter.detail', ['slug' => $comic->slug, 'id' => $comic->id, 'chapter_id' => $chapter->id]) }}"
                                                class="text-dark text-hover chapter">
                                                Chap {{ $chapter->number_chapter }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col-4 text-center">
                                        @if (isset($timeAgo[$chapter->id]))
                                            <p class="text-hover">{{ $timeAgo[$chapter->id] }}</p>
                                        @endif
                                    </div>
                                    <div class="col-4 text-center">
                                        <p class="">{{ $chapter->view }}</p>
                                    </div>
                                    <hr>
                                @endforeach

                            </div>



                        </div>
                    </div>
                    <!-- Exaple 1 -->

                </div>
                <!-- Grid column -->



            </div>
            <!-- Grid row -->
    </div>

    <div class="col-12">
        <div class="row">
            <h5 class="text-orange"><i class="fa-regular fa-comments"></i> 100 Bình luận</h5>
            <div class="form-group">
                <input id="my-input" class="form-control" style="height: 100px;" value="Nhập nội dung bình luận...."
                    type="text" name="comment">
            </div>
            <div class="form-group d-flex justify-content-end mt-2 mb-2">
                <button class="btn btn-outline-orange   ">Gửi</button>

            </div>

        </div>

    </div>
</div>

@include('client.layouts.footer')
