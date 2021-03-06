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
            <p class="navbar-text">[ {{ trans('back/menu.admin') }} ]</p>
        </div>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ Route::currentRouteNamed('back.profile.get') ? 'active' : '' }}">
                    <a href="{{ route('back.profile.get')  }}">{{ ucfirst(trans('back/menu.profile')) }}</a>
                </li>
                <li class="{{ Request::segment(2) === 'category' ? 'active' : '' }}">
                    <a href="{{ route('back.category.index')  }}">{{ ucfirst(trans('back/menu.categories')) }}</a>
                </li>
                <li class="{{ Request::segment(2) === 'work' ? 'active' : '' }}">
                    <a href="{{ route('back.work.index')  }}">{{ ucfirst(trans('back/menu.works')) }}</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
