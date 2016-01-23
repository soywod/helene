<table class="table table-admin">
    <thead>
        <tr>
            <th>{{ ucfirst(trans('general.title')) }}</th>
            <th>{{ ucfirst(trans('general.category')) }}</th>
            <th>{{ ucfirst(trans('general.size')) }}</th>
            <th class="text-center">{{ ucfirst(trans('general.box_price')) }}</th>
            <th class="text-center">{{ ucfirst(trans('general.unbox_price')) }}</th>
            <th class="text-center">{{ ucfirst(trans('back/work.sold')) }}</th>
            <th class="text-right">{{ ucfirst(trans('general.delete')) }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($works as $work)
            <tr>
                @include('back.work.partials.show')
            </tr>
        @endforeach
    </tbody>
</table>