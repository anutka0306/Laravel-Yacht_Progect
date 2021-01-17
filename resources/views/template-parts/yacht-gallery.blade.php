<div class="container yacht-page__slider">
    <div class="grid">
        @foreach($images as $image)
            <a data-fancybox="gallery" href="{{ asset('storage/images/yachts_gallery/'.$image->image) }}">
                <img class="img-fluid" src="{{ asset('storage/images/yachts_gallery/'.$image->image) }}" alt="...">
            </a>
        @endforeach

    </div>
</div>
