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

@if ($follows->count() > 0)


    <div class="container p-3">
        <h3>Truyện đang theo dõi</h3>
        <div class="row mt-5">
            @foreach ($follows as $value)
                <input type="hidden" name="" value="{{ $value->id }}">
                <div class="col-lg-3 col-md-4 col-6 text-center">
                    <div class="">
                        <a href="{{ url('/comic/' . $value->comic->slug . '/' . $value->comic->id) }}">
                            <img src="{{ asset('storage/' . $value->comic->cover_image) }}" class="col-12 rounded"
                                style="height:250px" alt="">
                        </a>
                    </div>
                    <div class="mt-2">
                        <a href="{{ url('/comic/' . $value->comic->slug . '/' . $value->comic->id) }}"
                            class="text-black fw-medium text-hover  ">{{ Str::limit($value->comic->name, 18, '...') }}</a>
                        <div class="d-flex justify-content-between mt-2 ">
                            @foreach ($latestChapters as $chapter)
                                @if ($chapter->comic_id == $value->comic->id)
                                    <a href="{{ url('/comic/chapter/' . $value->comic->slug . '/' . $value->comic->id . '/' . $chapter->id) }}"
                                        class="text-hover text-dark ">Chapter {{ $chapter->number_chapter }}</a>
                                    <p class="text-black-50 text-hover  ">
                                        {{ $chapter->created_at->diffForHumans() }}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@else
    <p>Bạn chưa theo dõi truyện nào.</p>
@endif

@include('client.layouts.footer')
