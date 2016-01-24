<div class="masonry-item" data-id="{{ $work->id }}">
    <div class="masonry-item-wrap">
        <div class="masonry-item-content">
            <a href="{{ url('img/work', $work->thumbnail) }}" data-lightbox="home-slide" data-title="{{ $work->getDesc() }}">
                <img src="{{ url('img/work', $work->thumbnail) }}" alt="{{ $work->title }}">
            </a>
        </div>
    </div>
</div>