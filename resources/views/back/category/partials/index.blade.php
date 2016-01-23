<table class="table table-admin">
    <thead>
        <tr>
            <th>{{ ucfirst(trans('general.name')) }}</th>
            <th>
                {{ ucfirst(trans('general.slug')) }}
                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="{{ trans('back/category.slug_desc') }}"></i>
            </th>
            <th class="text-right">{{ ucfirst(trans('general.delete')) }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                @include('back.category.partials.show')
            </tr>
        @endforeach
    </tbody>
</table>