@extends('layouts.app')

@section('content')
    <main class="container-xl py-4 py-lg-5">

        <section class="hero p-4 p-lg-5 mb-4">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <div class="eyebrow mb-3">
                        Your next chapter starts here
                    </div>

                    <h1 class="display-4 mb-3">
                        Find a book.<br>Find your world.
                    </h1>

                    <p class="lead mb-4">
                        Explore the library, borrow something brilliant, and
                        keep your reading journey in one place.
                    </p>

                    <a class="btn btn-light text-primary fw-bold px-4 py-2" href="#catalog">
                        Explore the collection
                        <span aria-hidden="true">→</span>
                    </a>
                </div>

                <div class="col-lg-5 d-none d-md-block">
                    <div class="book-stack" aria-hidden="true">
                        <div class="hero-book">The Art<br>of Focus</div>
                        <div class="hero-book">Small<br>Worlds</div>
                        <div class="hero-book">Green<br>Horizons</div>
                    </div>
                </div>
            </div>
        </section>

        <section id="catalog">

            <div class="d-flex justify-content-between align-items-end flex-wrap gap-2 mb-3">
                <div>
                    <h2 class="h3 fw-bold mb-1">Explore the collection</h2>
                    <p class="text-secondary mb-0">
                        Hand-picked stories and ideas for curious minds.
                    </p>
                </div>

                <span class="small text-secondary" id="bookCount">
                    {{ $books->count() }} books
                </span>
            </div>
            <div class="surface p-2 p-md-3 mb-4">
                <form action="#catalog">
                <div class="row g-2">
                    <div class="col">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">⌕</span>
                            <input type="text" name="category" value="{{ $search_category }}" class="d-none">
                            <input id="bookSearch" value="{{ $search }}" name="search" class="form-control border-start-0"
                                placeholder="Search by title, author, or category..." aria-label="Search books" />
                        </div>
                    </div>

                    <div class="col-auto">
                        <button class="btn btn-primary h-100 px-4" id="searchBtn">
                            Search
                        </button>
                    </div>
                </div>
                </form>
            </div>
            <div id="homeFilters" class="d-flex gap-2 flex-wrap mb-4">
              @foreach (config('constants.book_categories') as $category )
                @if ($search_category==$category)
                    <button class="btn btn-sm btn-primary rounded-pill" data-category="{{ $category }}">
                    {{ $category }}
                    </button>
                @else
                   <button class="btn btn-sm btn-outline-secondary rounded-pill" data-category="{{ $category }}">
                    {{ $category }}
                </button> 
                @endif
              @endforeach

                
            </div>

            <div class="row row-cols-2 row-cols-md-3 row-cols-xl-4 g-3 g-lg-4">

                @forelse ($books as $book)
                    <x-book-card :book="$book" :borrowed="$borrowedIds->contains($book->id)" />

                @empty

                    <div class="col-12">
                        <p class="text-secondary text-center py-5">
                            No books available yet.
                        </p>
                    </div>
                @endforelse

            </div>
        </section>

    </main>
@endsection
