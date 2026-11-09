
    <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
            <div class="container-xl py-1">
                <a class="navbar-brand d-flex align-items-center" href="/"
                    ><span class="brand-mark">L</span>ibrary</a
                >
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainNav"
                    aria-controls="mainNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav mx-auto my-3 my-lg-0 gap-lg-3">
                        
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                data-nav="profile"
                                href="#profile"
                                >My Library</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-nav="admin" href="/admin"
                                >Admin</a
                            >
                        </li>
                    </ul>
                    @if(auth()->guest())
                    <div class="d-flex gap-2">
                        <a class="btn btn-outline-secondary" href="/login"
                            >Sign in</a
                        ><a class="btn btn-primary" href="/register"
                            >Join library</a
                        >
                    </div>
                    @else
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                    @endif
                </div>
            </div>
        </nav>
