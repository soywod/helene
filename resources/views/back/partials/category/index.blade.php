<table class="table table-admin">
    <thead>
        <tr>
            <th>{{ trans('back/category.name') }}</th>
            <th>{{ trans('back/category.slug') }}</th>
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