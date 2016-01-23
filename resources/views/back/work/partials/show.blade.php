<td>
    <a href="{{ route('back.work.edit', ['id' => $work->id]) }}">
        {{ ucfirst($work->title) }}
    </a>
</td>
<td>
    {{ $work->category ? ucfirst($work->category->name) : ucfirst(trans('back/category.not_defined')) }}
</td>
<td>
    {{ $work->width }} x {{ $work->height }} cm
</td>
<td class="text-center">
    {{ round($work->box_price, 2) }} €
</td>
<td class="text-center">
    {{ round($work->unbox_price, 2) }} €
</td>
<td class="text-center">
    {{ $work->sold ? ucfirst(trans('general.yes')) : ucfirst(trans('general.no')) }}
</td>
<td class="text-right">
    <form method="POST" action="{{ route('back.work.destroy', ['id' => $work->id]) }}" data-message="{{ ucfirst(trans('back/work.confirm_delete')) }}" class="form-inline" onsubmit="return confirm(this.getAttribute('data-message'))">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button class="btn btn-link" type="submit">
            <i class="fa fa-trash-o fa-2x"></i>
        </button>
    </form>
</td>