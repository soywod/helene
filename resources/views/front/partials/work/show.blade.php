<div class="masonry-item" data-id="{{ $work->id }}">
    <div class="masonry-fade" style="display: none">
        <i class="fa fa-2x fa-search-plus"></i>
    </div>
    <img src="{{ url('img/work', $work->thumbnail) }}" alt="{{ $work->title }}">
</div>