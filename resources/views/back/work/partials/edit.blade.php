<form class="form-horizontal" method="POST" action="{{ route('back.work.update', ['id' => $work->id]) }}">

    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label for="work-title" class="col-sm-3 control-label">{{ ucfirst(trans('general.title')) }}</label>
        <div class="col-sm-9">
            <input id="work-title" name="title" type="text" class="form-control" value="{{ old('title') ?? $work->title }}">
        </div>
    </div>

    <div class="form-group">
        <label for="work-thumbnail" class="col-sm-3 control-label">{{ ucfirst(trans('general.photo')) }}</label>
        <div class="col-sm-9">
            <div class="work-thumbnail">
                <input type="hidden" name="thumbnail" value="{{ old('thumbnail') ?? $work->thumbnail }}">
                <img id="work-thumbnail" src="{{ url('img/work/' . $work->thumbnail) }}" alt="{{ ucfirst(trans('back/work.add_photo')) }}">
                <div class="work-thumbnail-edit" data-token="{{ csrf_token() }}" style="display: none">
                    <i class="fa fa-3x fa-pencil-square-o"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="work-category" class="col-sm-3 control-label">{{ ucfirst(trans('general.category')) }}</label>
        <div class="col-sm-9">
            <select name="category_id" id="work-category" class="form-control">
                @foreach(App\Category::all() as $category)
                    <option value="{{ $category->id }}"{{ $work->category && $category->id === $work->category->id ? ' selected' : '' }}>
                        {{ ucfirst($category->name) }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group{{ $errors->has('width') ? ' has-error' : '' }}">
        <label for="work-width" class="col-sm-3 control-label">{{ ucfirst(trans('general.width')) }} <small>(cm)</small></label>
        <div class="col-sm-9">
            <input id="work-width" name="width" type="text" class="form-control" value="{{ old('width') ?? $work->width }}">
        </div>
    </div>

    <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
        <label for="work-height" class="col-sm-3 control-label">{{ ucfirst(trans('general.height')) }} <small>(cm)</small></label>
        <div class="col-sm-9">
            <input id="work-height" name="height" type="text" class="form-control" value="{{ old('height') ?? $work->height }}">
        </div>
    </div>

    <div class="form-group{{ $errors->has('box_price') ? ' has-error' : '' }}">
        <label for="work-box-price" class="col-sm-3 control-label">{{ ucfirst(trans('general.box_price')) }} <small>(€)</small></label>
        <div class="col-sm-9">
            <input id="work-box-price" name="box_price" type="text" class="form-control" value="{{ old('box_price') ?? $work->box_price }}">
        </div>
    </div>

    <div class="form-group{{ $errors->has('unbox_price') ? ' has-error' : '' }}">
        <label for="work-unbox-price" class="col-sm-3 control-label">{{ ucfirst(trans('general.unbox_price')) }} <small>(€)</small></label>
        <div class="col-sm-9">
            <input id="work-unbox-price" name="unbox_price" type="text" class="form-control" value="{{ old('unbox_price') ?? $work->unbox_price }}">
        </div>
    </div>

    <div class="form-group">
        <label for="work-sold" class="col-sm-3 control-label">{{ ucfirst(trans('back/work.sold')) }}</label>
        <div class="col-sm-9">
            <input id="work-sold" name="sold" type="checkbox" data-on-text="{{ ucfirst(trans('general.yes')) }}" data-off-text="{{ ucfirst(trans('general.no')) }}" data-size="normal" class="form-control"{{ old('sold') || $work->sold ? ' checked' : '' }}>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9 text-right">
            <a href="{{ route('back.work.index') }}" class="btn btn-default">
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