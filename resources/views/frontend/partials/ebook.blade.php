<section class="container gap-60 flex-column">
    <div class="gap-16 flex-column">
        <button class="small-btn gap-8 flex-row align-items-center mx-auto">
            <div class="circle-8"></div>

            @if (session()->get('lang') == 'bangla')
                ইবুক
            @else
                Ebook
            @endif
        </button>

        <h3 class="section-heading mx-auto">

            @if (session()->get('lang') == 'bangla')
                আমাদের সাম্প্রতিক
            @else
                Our latest
            @endif
            <span class="title-container">
                <span class="highlight">
                    @if (session()->get('lang') == 'bangla')
                        ইবুক
                    @else
                        E-Book
                    @endif
                    <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg" alt="" />
                </span>
            </span>
        </h3>
    </div>

    @php
        $books = App\Models\Book::orderBy('id', 'desc')->where('status',1)->limit(4)->get();
    @endphp

    <div class="gap-60">
        <div class="row g-4">
            @foreach ($books as $book)
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="book-card p-4 bg-white gap-16 align-items-center gradient-border">
                        <img class="img-fluid w-100" src="{{ asset($book->image) }}"
                            alt="" />
                        <h5>
                            @if (session()->get('lang') == 'bangla')
                                {{ $book->category->name_bn }}
                            @else
                                {{ $book->category->name_en }}
                            @endif

                        </h5>

                        <div class="gap-16 flex-row justify-content-between w-100">
                            <div class="flex-grow-1">
                                <a href="{{ route('book.details',[
                                'id'=>$book->id,
                                'slug'=>$book->slug
                                ]) }}" class="btn btn-lg btn-outline-success rounded-pill w-100 h-100">

                                    @if (session()->get('lang') == 'bangla')
                                    দেখুন
                                    @else
                                    View
                                    @endif
                                </a>
                            </div>
                            {{-- <buptton class="btn btn-p-18 btn-outline-success rounded-pill">
                                <img src="{{ asset('/') }}frontend/images/download-01.svg" class="download-icon"
                                    alt="" />
                            </buptton> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            <a href="{{ route('all.book') }}" class="btn btn-lg btn-primary rounded-pill">

                @if (session()->get('lang') == 'bangla')
                সব বই দেখুন
                @else
                View All Books
                @endif
            </a>
            <a href="{{ route('all.book') }}"  class="btn btn-p-18 btn-primary rounded-pill">
                <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
            </a>
        </div>
    </div>
</section>
