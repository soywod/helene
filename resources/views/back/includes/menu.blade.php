<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('back.home') }}">{{ trans('back/menu.admin') }}</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('front.home')  }}">
                        <i class="fa fa-arrow-left"></i>
                        {{ trans('back/menu.back_to_front') }}
                    </a>
                </li>
                <li class="{{ Route::currentRouteNamed('back.profile') ? 'active' : '' }}">
                    <a href="{{ route('back.profile')  }}">{{ trans('back/menu.profile') }}</a>
                </li>
                <li class="{{ Route::currentRouteNamed('back.category.index') ? 'active' : '' }}">
                    <a href="{{ route('back.category.index')  }}">{{ trans('back/menu.categories') }}</a>
                </li>
                <li class="{{ Request::segment(2) === 'work' ? 'active' : '' }}">
                    <a href="{{ route('back.work.index')  }}">{{ trans('back/menu.works') }}</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
