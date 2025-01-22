<nav class="navbar navbar-expand-lg navbar-dark position-fixed top-0 left-0 w-100">
    <div class="container-fluid">
        <a class="navbar-brand d-flex " href="#">
            <img src="{{ asset('images/logo.jpg') }}" style="width: 50px;" alt="">
            <h3 class="m-2 mb-0">{{ __('messages.pasargad') }}</h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active fw-bold" aria-current="page" href="/">{{ __('messages.home') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active fw-bold" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('messages.stones') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($stoneTypes as $stoneType)
                            <li><a class="dropdown-item text-light fw-bold"
                                    href="/stones?search={{  $stoneType['name_' . app()->getLocale()]}}">{{ $stoneType['name_' . app()->getLocale()] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active fw-bold" href="#" id="navbarDropdown2"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('messages.projects') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        @foreach ($projectTypes as $projectType)
                            <li><a class="dropdown-item text-light fw-bold"
                                    href="/projects?search={{ $projectType['name_' . app()->getLocale()] }}">{{ $projectType['name_' . app()->getLocale()] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active fw-bold" href="#" id="navbarDropdown3"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('messages.quarries') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                        @foreach ($stoneTypes as $stoneType)
                            <li><a class="dropdown-item text-light fw-bold"
                                    href="/quarries?search={{ $stoneType['name_' . app()->getLocale()]  }}">{{ $stoneType['name_' . app()->getLocale()] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active fw-bold" href="#" id="navbarDropdown4"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('messages.language') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown4">
                        <li><a class="dropdown-item text-light fw-bold" href="{{ url('/setlocale/fa') }}"
                                onclick="setDirection('rtl')">فارسی</a></li>
                        <li><a class="dropdown-item text-light fw-bold" href="{{ url('/setlocale/en') }}"
                                onclick="setDirection('ltr')">English</a></li>
                    </ul>



                </li>
                <li class="nav-item">
                    <a class="nav-link active fw-bold" href="/articles">{{ __('messages.articles') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fw-bold" href="/about"> {{ __('messages.aboutUs') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fw-bold" href="/contact"> {{ __('messages.contactUs') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
