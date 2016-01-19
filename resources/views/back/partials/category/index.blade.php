<table class="table table-admin">
    <thead>
        <tr>
            <th>{{ ucfirst(trans('general.name')) }}</th>
            <th>
                {{ ucfirst(trans('general.slug')) }}
                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="{{ trans('back/category.slug_desc') }}"></i>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                @include('back.partials.category.show')
            </tr>
        @endforeach
    </tbody>
</table>