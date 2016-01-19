<form class="form-horizontal" method="POST" action="{{ route('back.work.update', ['id' => $work->id]) }}">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="work-title" class="col-sm-2 control-label">{{ ucfirst(trans('general.title')) }}</label>
        <div class="col-sm-10">
            <input id="work-title" name="title" type="text" class="form-control" value="{{ old('title') ?? $work->title }}">
        </div>
    </div>

    <div class="form-group">
        <label for="work-width" class="col-sm-2 control-label">{{ ucfirst(trans('general.width')) }} (cm)</label>
        <div class="col-sm-10">
            <input id="work-width" name="width" type="number" class="form-control" value="{{ old('width') ?? $work->width }}">
        </div>
    </div>

    <div class="form-group">
        <label for="work-height" class="col-sm-2 control-label">{{ ucfirst(trans('general.height')) }} (cm)</label>
        <div class="col-sm-10">
            <input id="work-height" name="height" type="number" class="form-control" value="{{ old('height') ?? $work->height }}">
        </div>
    </div>

    <div class="form-group">
        <label for="work-box-price" class="col-sm-2 control-label">{{ ucfirst(trans('general.box_price')) }} (€)</label>
        <div class="col-sm-10">
            <input id="work-box-price" name="box-price" type="number" class="form-control" value="{{ old('box-price') ?? $work->box_price }}">
        </div>
    </div>

    <div class="form-group">
        <label for="work-unbox-price" class="col-sm-2 control-label">{{ ucfirst(trans('general.unbox_price')) }} <small>(€)</small></label>
        <div class="col-sm-10">
            <input id="work-unbox-price" name="unbox-price" type="number" class="form-control" value="{{ old('unbox-price') ?? $work->unbox_price }}">
        </div>
    </div>

    <div class="form-group">
        <label for="work-sold" class="col-sm-2 control-label">{{ ucfirst(trans('back/work.sold')) }}</label>
        <div class="col-sm-10">
            <input id="work-sold" name="sold" type="checkbox" data-on-text="{{ ucfirst(trans('general.yes')) }}" data-off-text="{{ ucfirst(trans('general.no')) }}" data-size="normal" class="form-control"{{ old('sold') OR $work->sold ? ' checked' : '' }}>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10 text-right">
            <button type="submit" class="btn btn-default">
                <i class="fa fa-floppy-o"></i>
                {{ ucfirst(trans('general.save')) }}
            </button>
        </div>
    </div>
</form>