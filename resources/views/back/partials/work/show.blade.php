<td>
    <a href="{{ route('back.work.edit', ['id' => $work->id]) }}">
        {{ ucfirst($work->title) }}
    </a>
</td>
<td>
    {{ ucfirst($work->category->name) }}
</td>
<td>
    {{ $work->width }} x {{ $work->height }} cm
</td>
<td>
    {{ round($work->box_price, 2) }} €
</td>
<td>
    {{ round($work->unbox_price, 2) }} €
</td>
<td>
    {{ $work->sold ? ucfirst(trans('general.yes')) : ucfirst(trans('general.no')) }}
</td>