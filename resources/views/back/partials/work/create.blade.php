<form class="form-horizontal" method="POST" action="{{ route('back.work.store') }}">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="work-title" class="col-sm-2 control-label text-capitalize">{{ trans('general.title') }}</label>
        <div class="col-sm-10">
            <input id="work-title" name="title" type="text" class="form-control" value="{{ old('title') }}">
        </div>
    </div>

    <div class="form-group">
        <label for="work-category" class="col-sm-2 control-label text-capitalize">{{ trans('general.category') }}</label>
        <div class="col-sm-10">
            <select name="category_id" id="work-category" class="form-control">
                @foreach(App\Category::all() as $category)
                    <option value="{{ $category->id }}">
                        {{ ucfirst($category->name) }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="work-width" class="col-sm-2 control-label text-capitalize">{{ trans('general.width') }} <small>(cm)</small></label>
        <div class="col-sm-10">
            <input id="work-width" name="width" type="number" class="form-control" value="{{ old('width') }}">
        </div>
    </div>

    <div class="form-group">
        <label for="work-height" class="col-sm-2 control-label text-capitalize">{{ trans('general.height') }} <small>(cm)</small></label>
        <div class="col-sm-10">
            <input id="work-height" name="height" type="number" class="form-control" value="{{ old('height') }}">
        </div>
    </div>

    <div class="form-group">
        <label for="work-box-price" class="col-sm-2 control-label text-capitalize">{{ trans('general.box_price') }} <small>(€)</small></label>
        <div class="col-sm-10">
            <input id="work-box-price" name="box_price" type="number" class="form-control" value="{{ old('box-price') }}">
        </div>
    </div>

    <div class="form-group">
        <label for="work-unbox-price" class="col-sm-2 control-label text-capitalize">{{ trans('general.unbox_price') }} <small>(€)</small></label>
        <div class="col-sm-10">
            <input id="work-unbox-price" name="unbox_price" type="number" class="form-control" value="{{ old('unbox-price') }}">
        </div>
    </div>

    <div class="form-group">
        <label for="work-sold" class="col-sm-2 control-label text-capitalize">{{ trans('back/work.sold') }}</label>
        <div class="col-sm-10">
            <input id="work-sold" name="sold" type="checkbox" data-on-text="{{ ucfirst(trans('general.yes')) }}" data-off-text="{{ ucfirst(trans('general.no')) }}" data-size="normal" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10 text-right">
            <a href="{{ URL::previous() }}" class="btn btn-default text-capitalize">
                <i class="fa fa-arrow-left"></i>
                {{ trans('general.back') }}
            </a>
            <button type="submit" class="btn btn-default text-capitalize">
                <i class="fa fa-floppy-o"></i>
                {{ trans('general.save') }}
            </button>
        </div>
    </div>
</form>