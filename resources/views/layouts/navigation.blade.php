<nav x-data="{ open: false }" class="bg-white shadow-sm border-bottom">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center py-3">

            <!-- Logo -->
            <div class="d-flex align-items-center">

                <a href="{{ route('dashboard') }}" class="text-decoration-none">

                   

                </a>

                <div class="ms-5 d-none d-lg-flex">

                    <a href="{{ route('dashboard') }}"
                       class="nav-link me-4 {{ request()->routeIs('dashboard') ? 'fw-bold text-primary' : 'text-dark' }}">
                        🏠 Dashboard
                    </a>

                    <a href="{{ route('blog.index') }}"
                       class="nav-link me-4 {{ request()->routeIs('blog.*') ? 'fw-bold text-primary' : 'text-dark' }}">
                        🌐 Blog Pribadi
                    </a>

                    <a href="{{ route('categories.index') }}"
                       class="nav-link me-4 {{ request()->routeIs('categories.*') ? 'fw-bold text-primary' : 'text-dark' }}">
                        📂 Kategori
                    </a>

                    <a href="{{ route('articles.index') }}"
                       class="nav-link {{ request()->routeIs('articles.*') ? 'fw-bold text-primary' : 'text-dark' }}">
                        📝 Artikel
                    </a>

                </div>

            </div>

            <!-- Right -->
            <div class="d-flex align-items-center">

                @auth

                <div class="dropdown">

                    <button
                        class="btn btn-light border rounded-pill px-4 dropdown-toggle shadow-sm"
                        data-bs-toggle="dropdown">

                        👤 {{ Auth::user()->name }}

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4">

                        <li>

                            <div class="px-3 py-2">

                                <strong>{{ Auth::user()->name }}</strong>

                                <br>

                                <small class="text-muted">

                                    {{ Auth::user()->email }}

                                </small>

                            </div>

                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li>

                            <a class="dropdown-item"
                               href="{{ route('profile.edit') }}">

                                👤 Profile

                            </a>

                        </li>

                        <li>

                            <form method="POST"
                                  action="{{ route('logout') }}">

                                @csrf

                                <button
                                    type="submit"
                                    class="dropdown-item text-danger">

                                    🚪 Logout

                                </button>

                            </form>

                        </li>

                    </ul>

                </div>

                @else

                <a href="{{ route('login') }}"
                   class="btn btn-primary rounded-pill px-4">

                    Login

                </a>

                @endauth

            </div>

        </div>

    </div>

</nav>