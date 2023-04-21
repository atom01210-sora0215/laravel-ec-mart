<nav class="navbar navbar-expand-md navbar-light shadow-sm ecmart-header-container">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('img/eclogo.png')}}">
        </a>
        <form method="GET" action="{{ route('search_product')}}" class="row g-1">
            <div class="col-auto">
                <input type="search" name="search" value="{{request('search')}}" placeholder="キーワードを入力" class="form-control ecmart-header-search-input">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn ecmart-header-search-button"><i class="fas fa-search ecmart-header-search-icon"></i></button>
            </div>
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto mr-5 mt-2">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <hr>
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('login') }}"><i class="far fa-heart"></i></a>
                </li>
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-shopping-cart"></i></a>
                </li>
                @else
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('mypage') }}">
                        <i class="fas fa-user mr-1"></i><label>マイページ</label>
                    </a>
                </li>
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('mypage.favorite') }}">
                        <i class="far fa-heart"></i>
                    </a>
                </li>
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{ route('carts.index') }}">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>