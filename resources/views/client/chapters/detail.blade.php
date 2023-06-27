@include('client.layouts.header')
@include('client.layouts.sidebar')
<div class="container bg-white" style="border-radius: 10px;">
    <div class="row mt-5 mb-5 text-center pt-4 pe-5  ">
        <div class="">
            <a href="{{ route('trang-chu') }}" class="text-dark text-hover">Trang chủ /</a>
            <a href="{{ url('/comic/' . $comic->slug . '/' . $comic->id) }}"
                class="text-dark text-hover">{{ $comic->name }} /</a>
            <a href="" class="text-dark text-hover">Chapter {{ $chapters->number_chapter }}</a>
        </div>
        <div>
            <p class="">
                <a href="{{ url('/comic/' . $comic->slug . '/' . $comic->id) }}"
                    class="fs-4 text-orange">{{ $comic->name }}</a>
            </p>

        </div>

    </div>
</div>

<div class="container bg-white" style="border-radius: 10px;">
    <div class="row mt-5 mb-5 text-center pt-4  ">
        <div class="col-12">
            @foreach ($chapterImage as $value)
                @if ($value->chapter_id == $chapters->id)
                    <img src="{{ asset('storage/chapters/' . $value->image) }}" alt="" class="img-fluid">
                @endif
            @endforeach
        </div>

        <div class="mt-5 mb-5 col-12">
            <div class="row ">
                <div class="col-lg-4 col-md-3 col-3">
                    <a href="{{ route('trang-chu') }}"> <i class="fa-solid fa-house fs-3 w-50"></i></a>
                    <i class="fa-solid fa-triangle-exclamation fs-3 "></i>
                </div>
                <div class="col-lg-4 col-md-6 col-6">
                    <div class="row">
                        <div class="col-3">
                            @if ($prevChapter)
                                <a href="{{ route('chapter.detail', [$comic->slug, $comic->id, $prevChapter->id]) }}" class="btn btn-outline-orange w-100"><i
                                        class="fa-solid fa-chevron-left  "></i></a>
                            @endif
                        </div>
                        <div class="col-6">
                            <select name="chapter_id" class="btn border text-dark w-100 " id="chapter-select">
                                @foreach ($listChapter as $value)
                                @if ($value->comic_id == $comic->id)
                                    <option value="{{ $value->id }}"
                                        {{ $chapters->id == $value->id ? 'selected' : '' }}
                                        class="text-center chapter-option">
                                        Chap {{ $value->number_chapter }}
                                    </option>
                                @endif
                            @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            @if ($nextChapter)
                                <a href="{{ route('chapter.detail', [$comic->slug, $comic->id, $nextChapter->id]) }}" class="btn btn-outline-orange col-3 w-100"><i
                                        class="fa-solid fa-chevron-right "></i></a>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-3">
                    <i class="fa-solid fa-bookmark fs-3 w-50"></i>
                    <i class="fa-solid fa-arrow-up fs-3"></i>
                </div>
            </div>

        </div>
    </div>

</div>

<script>
    //Chuyển chapter trong thẻ select option
    const chapterSelect = document.getElementById('chapter-select');
    chapterSelect.addEventListener('change', (event) => {
        const selectedChapterId = event.target.value;
        const url = '{{ url('/comic/chapter/' . $comic->slug . '/' . $comic->id ) }}' + '/' +selectedChapterId ;
        window.location.href = url;
    });
</script>


@include('client.layouts.footer')
