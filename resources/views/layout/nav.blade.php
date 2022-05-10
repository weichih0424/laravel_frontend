<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="container">
        <img class="nav_img" src="{{ URL::asset('storage/image/chicken.png') }}" width='80px' height="80px">
        <a class="navbar-brand" href="#">咕咕雞農場</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                @foreach ($navbars_array as $navbar_array)
                    @if (isset($navbar_array->SubNav) && $navbar_array->SubNav)
                    <li class="nav-item dropdown h5">
                        <a class="nav-link" href="#">{{ $navbar_array->name }}</a>
                        <div>
                            <ul class="dropdown-menu">
                            @foreach ($navbar_array->SubNav as $SubNav)
                                <li>
                                    <a class="dropdown-item" href="#">{{ $SubNav->name }}</a>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </li>
                    @else
                    <li class="nav-item h5">
                        <a class="nav-link" href="#">{{ $navbar_array->name }}</a>
                    </li>
                    @endif
                @endforeach
            {{-- <li class="nav-item h5">
                <a class="nav-link active" aria-current="page" href="#">首頁</a>
            </li>
            <li class="nav-item h5">
                <a class="nav-link" href="#">關於我們</a>
            </li>
            <li class="nav-item h5">
                <a class="nav-link" href="#">服務</a>
            </li>
            <li class="nav-item dropdown h5">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                下拉選單
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Google</a></li>
                <li><a class="dropdown-item" href="#">Youtube</a></li>
                <li><a class="dropdown-item" href="#">Instagram</a></li>
                </ul>
            </li> --}}
            </ul>
        </div>
    </div>
</nav>