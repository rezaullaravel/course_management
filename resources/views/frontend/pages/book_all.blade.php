@extends('frontend.master')

@section('title')
    {{ 'Book Page' }}
@endsection
@section('content')
    <section class="container gap-60">
        <!--Section heading -->
        <div class="gap-32">



            <h3 class="section-heading text-center">
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


            <div class="line"></div>
        </div>

        <!-- buttons -->
        <div class="d-flex justify-content-center">
            <ul class="gap-16 flex-row w-100 overflow-x-auto border-0 mx-w-fit" id="myTab" role="tablist">
                <li class="nav-item text-nowrap" role="presentation">
                    <button class="active btn btn-lg btn-primary-50" id="allcourse-tab" data-bs-toggle="tab"
                        data-bs-target="#allbook-tab-pane" type="button" role="tab"
                        aria-controls="allcourse-tab-pane" aria-selected="true">
                        @if (session()->get('lang') == 'bangla')
                            সব ইবুক
                        @else
                            All Book
                        @endif
                    </button>
                </li>

                {{-- category fetch --}}
                @php
                    $categories = App\Models\Category::get();
                @endphp

                @foreach ($categories as $category)
                    <li class="nav-item" role="presentation">
                        <button class="btn btn-lg bg-primary-50" id="quran-tab" data-bs-toggle="tab"
                            data-bs-target="#book-category{{ $category->id }}" type="button" role="tab"
                            aria-controls="quran-tab-pane" aria-selected="false">

                            @if (session()->get('lang') == 'bangla')
                                {{ $category->name_bn }}
                            @else
                                {{ $category->name_en }}
                            @endif
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Course tab wrapper -->
        <div class="tab-content" id="myTabContent">
            <!-- Tab -->
            {{-- all book --}}
            <div class="tab-pane fade show active" id="allbook-tab-pane" role="tabpanel" aria-labelledby="allcourse-tab"
                tabindex="0">
                <!-- Content -->
                <div class="row g-3">
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

                    {{-- paginate --}}

                    {{ $books->links() }}

                    {{-- paginate --}}
                </div>

            </div>
            {{-- all course --}}
            <!-- category wise book show -->
            @foreach ($categories as $category)
                <div class="tab-pane fade" id="book-category{{ $category->id }}" role="tabpanel" aria-labelledby="quran-tab"
                    tabindex="0">
                    <div class="row g-3">
                        @php
                            $catwiseBook = App\Models\Book::where('category_id', $category->id)
                                ->where('status', 1)
                                ->orderBy('id', 'desc')
                                ->limit(20)
                                ->get();
                        @endphp
                         @foreach ($catwiseBook as $book)
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
                </div>
            @endforeach

        </div>
    </section>


    <!-- E-books -->
    @include('frontend.partials.course')


    <!-- Blog -->
    @include('frontend.partials.blog')
@endsection
