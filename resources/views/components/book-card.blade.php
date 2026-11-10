  @props(['book','borrowed'])
 
  <div class="col">
                    <article class="surface p-2 p-md-3 pt-0 h-100">

                        <div class="book-cover">
                            <img
                                class="w-100 h-100"
                                src="{{ asset('storage/' . $book->thumbnail) }}"
                                alt="{{ $book->title }}"
                            >
                        </div>

                        <div class="pt-3">

                            <h3 class="h6 fw-bold mb-1">
                                {{ $book->title }}
                            </h3>

                            <div class="small text-secondary mb-3">
                                {{ $book->author_name }} · {{ $book->category }}
                            </div>

                            <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2">

                                <span class="badge {{ $book->available_copies > 0 ? 'bg-success' : 'bg-danger' }}">
                                    @if ($book->available_copies > 0)
                                        {{ $book->available_copies }} available
                                    @else
                                      Unavilable
                                    @endif
                                </span>
                                @if ($borrowed)
                                    <button disabled class="btn btn-sm btn-outline-success"> Already Borrowed</button>
                                @else
                                <form action="{{ route('borrow-book',$book->id) }}" method="POST">
                                    @csrf
                                    <button
                                    class="btn btn-sm {{ $book->available_copies > 0 ? 'btn-primary' : 'btn-outline-secondary' }} "
                                    {{ $book->available_copies <= 0 ? 'disabled' : '' }}
                                >
                                    {{ $book->available_copies > 0 ? 'Borrow' : 'Unavailable' }}
                                </button>

                                </form>
                                 @endif
                            </div>
                        </div>

                    </article>
                </div>