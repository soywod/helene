<td>
    <a href="{{ route('back.category.edit', ['id' => $category->id]) }}">
        {{ ucfirst($category->name) }}
    </a>
</td>
<td>
    {{ $category->slug }}
</td>
<td class="text-right">
    <form method="POST" action="{{ route('back.category.destroy', ['id' => $category->id]) }}" data-message="{{ ucfirst(trans('back/category.confirm_delete')) }}" class="form-inline" onsubmit="return confirm(this.getAttribute('data-message'))">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button class="btn btn-link" type="submit">
            <i class="fa fa-trash-o fa-2x"></i>
        </button>
    </form>
</td>