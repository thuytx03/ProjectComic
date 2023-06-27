@extends('client.layouts.main')
@section('home-content')
    <!-- Comic Hot  -->
    {{-- <div class="container-fluid">
        <div class="container-slider swiper">
            <h5 class="text-danger"><i class="fa-sharp fa-solid fa-star "></i> Truyện hot</h5>
            <div class="slide-container">
                <div class="card-wrapper swiper-wrapper">
                    @foreach ($comicVip as $value)
                        @if ($value->vip == 1 && $value->status == 1)
                            <div class="card swiper-slide">
                                <div class="image-box">
                                    <a href="{{ url('/comic/' . $value->slug . '/' . $value->id) }}">
                                        <img src="{{ asset('storage/' . $value->cover_image) }}" alt="" />

                                    </a>
                                </div>
                                <div class="profile-details">
                                    <div class="name-job">
                                        <a href="{{ url('/comic/' . $value->slug . '/' . $value->id) }}"
                                            class="text-dark text-hover">
                                            <h3 class="name ">{{ Str::limit($value->name, 17, '...') }}</h3>
                                        </a>
                                        <div class="d-flex justify-content-between mt-2 gap-4  ">
                                            @foreach ($latestChapters as $chapter)
                                                @if ($chapter->comic_id == $value->id)
                                                <a href="{{ url('/comic/chapter/' . $value->slug . '/' . $value->id . '/' . $chapter->id) }}" class="text-hover text-dark">Chapter {{ $chapter->number_chapter }}</a>
                                                <p class="text-black-50 text-hover">
                                                        {{ $chapter->created_at->diffForHumans() }}</p>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div> --}}
    <!-- End Comic Hot  -->

    <!-- Comic vip  -->
    <div class="container-fluid ">
        <div class="container-slider swiper">
            <h5 class="text-danger"><i class="fa-sharp fa-solid fa-star "></i> Truyện vip (có phí)</h5>
            <div class="slide-container">
                <div class="card-wrapper swiper-wrapper">
                    @foreach ($topComics as $value)

                            <div class="card swiper-slide">
                                <div class="image-box">
                                    <a href="{{ url('/comic/' . $value->slug . '/' . $value->id) }}">
                                        <img src="{{ asset('storage/' . $value->cover_image) }}" alt="" />

                                    </a>
                                </div>
                                <div class="profile-details">
                                    <div class="name-job">
                                        <a href="{{ url('/comic/' . $value->slug . '/' . $value->id) }}"
                                            class="text-dark text-hover">
                                            <h3 class="name ">{{ Str::limit($value->name, 17, '...') }}</h3>
                                        </a>
                                        <div class="d-flex justify-content-between mt-2 gap-4 ">
                                            @foreach ($latestChapters as $chapter)
                                                @if ($chapter->comic_id == $value->id)
                                                <a href="{{ url('/comic/chapter/' . $value->slug . '/' . $value->id . '/' . $chapter->id) }}" class="text-hover text-dark">Chapter {{ $chapter->number_chapter }}</a>
                                                <p class="text-black-50 text-hover">
                                                        {{ $chapter->created_at->diffForHumans() }}</p>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>

                    @endforeach
                </div>
            </div>
            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- End Comic vip  -->

    <!-- Comic New -->
    <div class="container-fluid mt-4 mb-4">
        <h5 class="text-danger"><i class="fa-sharp fa-solid fa-star "></i> Truyện mới cập nhật</h5>
        <div class="row mt-4">
            <div class="col-lg-8 col-md-7 col-12">
                <div class="row">
                    @foreach ($comics as $value)
                        @if ($value->status == 1 && $value->vip == 0)
                            <input type="hidden" name="" value="{{ $value->id }}">
                            <div class="col-lg-3 col-md-4 col-6 text-center">
                                <div class="">
                                    <a href="{{ url('/comic/' . $value->slug . '/' . $value->id) }}">
                                        <img src="{{ asset('storage/' . $value->cover_image) }}" class="col-12 rounded"
                                            style="height:250px" alt="">
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <a href="{{ url('/comic/' . $value->slug . '/' . $value->id) }}"
                                        class="text-black fw-medium text-hover  ">{{ Str::limit($value->name, 18, '...') }}</a>

                                    {{-- <a href="{{ url('/comic/'.$value->slug.'-'.$value->id) }}" class="text-black ">{{ $value->name }}</a> --}}
                                    <div class="d-flex justify-content-between mt-2 ">
                                        @foreach ($latestChapters as $chapter)
                                            @if ($chapter->comic_id == $value->id)
                                                <a href="{{ url('/comic/chapter/' . $value->slug . '/' . $value->id . '/' . $chapter->id) }}"
                                                    class="text-hover text-dark ">Chapter {{ $chapter->number_chapter }}</a>
                                                <p class="text-black-50 text-hover  ">
                                                    {{ $chapter->created_at->diffForHumans() }}</p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <style>
                .img-top {
                    border-radius: 5px;
                    width: 100%;
                    height: 60%;
                }
            </style>
            <div class="col-lg-4 col-md-5 col-12">
                <ul class="navbar nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item list-unstyled" role="presentation">
                        <button class="nav-link active" id="day-tab" data-bs-toggle="tab" data-bs-target="#day"
                            type="button" role="tab" aria-controls="day" aria-selected="true">Top Ngày</button>
                    </li>
                    <li class="nav-item list-unstyled" role="presentation">
                        <button class="nav-link" id="week-tab" data-bs-toggle="tab" data-bs-target="#week" type="button"
                            role="tab" aria-controls="week" aria-selected="false">Top Tuần</button>
                    </li>
                    <li class="nav-item list-unstyled" role="presentation">
                        <button class="nav-link" id="total-tab" data-bs-toggle="tab" data-bs-target="#total" type="button"
                            role="tab" aria-controls="total" aria-selected="false">Top Tổng</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active " id="day" role="tabpanel" aria-labelledby="day-tab">
                        <div class="row ">
                            <div class="col-12">
                                @foreach ($topComics as $key => $value)
                                    <div class="row">
                                        <div class="col-1 mt-4 ">{{ $key + 1 }}</div>
                                        <div class="col-3 mt-1"><img src="{{ asset('storage/' . $value->cover_image) }}"
                                                class="img-top" alt=""></div>
                                        <div class="col-6 mt-1">
                                            <p>{{ $value->name }}
                                                <br>
                                                @foreach ($latestChapters as $chapter)
                                                    @if ($chapter->comic_id == $value->id)
                                                        <a href="{{ url('/comic/chapter/' . $value->slug . '/' . $value->id . '/' . $chapter->id) }}"
                                                            class="text-hover text-dark ">Chapter
                                                            {{ $chapter->number_chapter }}</a>
                                                    @endif
                                                @endforeach

                                            </p>
                                        </div>
                                        <div class="col-2 mt-5">
                                            <i class="fa-solid fa-eye"></i> {{ $value->view }}
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>
                    <div class="tab-pane fade" id="week" role="tabpanel" aria-labelledby="week-tab">
                        <div class="row ">
                            <div class="col-12">
                                @foreach ($topComics as $key => $value)
                                    <div class="row">
                                        <div class="col-1 mt-4 ">{{ $key + 1 }}</div>
                                        <div class="col-3 mt-1"><img src="{{ asset('storage/' . $value->cover_image) }}"
                                                class="img-top" alt=""></div>
                                        <div class="col-6 mt-1">
                                            <p>{{ $value->name }}
                                                <br>
                                                @foreach ($latestChapters as $chapter)
                                                    @if ($chapter->comic_id == $value->id)
                                                        <a href="{{ url('/comic/chapter/' . $value->slug . '/' . $value->id . '/' . $chapter->id) }}"
                                                            class="text-hover text-dark ">Chapter
                                                            {{ $chapter->number_chapter }}</a>
                                                    @endif
                                                @endforeach

                                            </p>
                                        </div>
                                        <div class="col-2 mt-5">
                                            <i class="fa-solid fa-eye"></i> {{ $value->view }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    </div>
                    <div class="tab-pane fade" id="total" role="tabpanel" aria-labelledby="total-tab">
                        <div class="row ">
                            <div class="col-12">
                                @foreach ($topComics as $key => $value)
                                    <div class="row">
                                        <div class="col-1 mt-4 ">{{ $key + 1 }}</div>
                                        <div class="col-3 mt-1"><img src="{{ asset('storage/' . $value->cover_image) }}"
                                                class="img-top" alt=""></div>
                                        <div class="col-6 mt-1">
                                            <p>{{ $value->name }}
                                                <br>
                                                @foreach ($latestChapters as $chapter)
                                                    @if ($chapter->comic_id == $value->id)
                                                        <a href="{{ url('/comic/chapter/' . $value->slug . '/' . $value->id . '/' . $chapter->id) }}"
                                                            class="text-hover text-dark ">Chapter
                                                            {{ $chapter->number_chapter }}</a>
                                                    @endif
                                                @endforeach

                                            </p>
                                        </div>
                                        <div class="col-2 mt-5">
                                            <i class="fa-solid fa-eye"></i> {{ $value->view }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    </div>
                </div>
            </div>






        </div>
        {{ $comics->links() }}

    </div>
    <!-- End Comic New  -->
@endsection
