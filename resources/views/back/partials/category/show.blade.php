<td>
    <a href="{{ route('back.category.edit', ['id' => $category->id]) }}">
        {{ ucfirst($category->name) }}
    </a>
</td>
<td>
    {{ $category->slug }}
</td>