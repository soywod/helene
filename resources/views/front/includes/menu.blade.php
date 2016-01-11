<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">{{ trans('front/home.full_name') }}</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ url('/') }}">{{ trans('front/menu.home') }}</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ trans('front/menu.works') }}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">
                                {{ trans('front/menu.theme_1') }}
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                {{ trans('front/menu.theme_2') }}
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                {{ trans('front/menu.theme_3') }}
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                {{ trans('front/menu.theme_4') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/contact') }}">{{ trans('front/menu.contact') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>