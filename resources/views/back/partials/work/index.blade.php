<table class="table table-admin">
    <thead>
        <tr>
            <th>{{ ucfirst(trans('general.title')) }}</th>
            <th>{{ ucfirst(trans('general.size')) }}</th>
            <th>{{ ucfirst(trans('general.box_price')) }}</th>
            <th>{{ ucfirst(trans('general.unbox_price')) }}</th>
            <th>{{ ucfirst(trans('back/work.sold')) }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($works as $work)
            <tr>
                @include('back.partials.work.show')
            </tr>
        @endforeach
    </tbody>
</table>