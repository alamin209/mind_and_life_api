<h2 style="text-align: center">Article Details </h2>
<hr>

<h4 style="text-align: center">Article : {{ $article->title }}</h4>

<h4 style="text-align: center">Category : {{ $article->category->name ?? '' }}</h4>

<h4 style="text-align: center">Aurthor : {{ $article->author->username ?? '' }}</h4>

<h4 style="text-align: center"> Photo

    <div class="avatar-upload top-photo d-flex justify-content-center">
        <div class="avatar-edit"></div>
        @if(count($article->articleImages) > 0)
            @foreach($article->articleImages as $pImage)
                <div class="single-product-image-prev-item" data-id="{{ $pImage->id }}">
                    <div class="avatar-image-preview" id="productCoverPrev" style="background-image: url({{ asset($pImage->image_url) }});"></div>
                    {{-- @if($pImage->default_image == 1)
                    <span class="sp-default-img">Cover</span>
                    @endif --}}
                </div>
            @endforeach 
        @endif
    </div>
</h4>
<h4 style="text-align: center">Post Date : {{ $article->post_date }}</h4>

<h4 style="text-align: center">Tag Details </h4>

@foreach ($article->article_tags  as $article_tag )

    <h4 style="text-align: center">Tag : {{ $article_tag->tag_name}}</h4>

@endforeach



