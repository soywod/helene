<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('front.home') }}">{{ trans('front/menu.full_name') }}</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ Route::currentRouteNamed('front.home') ? 'active' : '' }}">
                    <a href="{{ route('front.home')  }}">{{ trans('front/menu.home') }}</a>
                </li>
                <li>
                    <a href="#">{{ trans('front/menu.contact') }}</a>
                </li>
                <li class="dropdown{{ Route::currentRouteNamed('front.works') ? ' active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ trans('front/menu.works') }}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach(App\Category::all() as $category)
                            <li class="{{ Request::segment(2) === $category->slug ? 'active' : '' }}">
                                <a href="{{ route('front.works', ['category' => $category->slug]) }}">
                                    {{ Lang::has('category.' . $category->slug) ? ucfirst(Lang::get('category.' . $category->slug)) : ucfirst($category->name) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
