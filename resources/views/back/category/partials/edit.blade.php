<form class="form-horizontal" method="POST" action="{{ route('back.category.update', ['id' => $category->id]) }}">

    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="category-name" class="col-sm-3 control-label">{{ ucfirst(trans('general.name')) }}</label>
        <div class="col-sm-9">
            <input id="category-name" name="name" type="text" class="form-control" value="{{ old('name') ?? $category->name }}">
        </div>
    </div>

    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
        <label for="category-slug" class="col-sm-3 control-label">
            {{ ucfirst(trans('general.slug')) }}
            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{ trans('back/category.slug_desc') }}"></i>
        </label>
        <div class="col-sm-9">
            <input id="category-slug" name="slug" type="text" class="form-control" value="{{ old('slug') ?? $category->slug }}">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9 text-right">
            <a href="{{ URL::previous() }}" class="btn btn-default">
                <i class="fa fa-arrow-left"></i>
                {{ ucfirst(trans('general.back')) }}
            </a>
            <button type="submit" class="btn btn-default">
                <i class="fa fa-floppy-o"></i>
                {{ ucfirst(trans('general.save')) }}
            </button>
        </div>
    </div>
</form>