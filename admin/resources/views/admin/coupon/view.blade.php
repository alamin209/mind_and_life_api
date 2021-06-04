<h2 style="text-align: center">Article Details </h2>
<hr>

<h4 style="text-align: center">Article : {{ $article->title }}</h4>

<h4 style="text-align: center">Category : {{ $article->category->name ?? '' }}</h4>

<h4 style="text-align: center">Aurthor : {{ $article->author->username ?? '' }}</h4>

<h4 style="text-align: center"> Photo

    @if (file_exists($article->image_path))

        <img src="{{ asset($article->image_path) }}" height="120px" width=120px
             style="margin-bottom: 10px">
    @else
    @endif
</h4>
<h4 style="text-align: center">Post Date : {{ $article->post_date }}</h4>

<h4 style="text-align: center">Tag Details </h4>

@foreach ($article->article_tags  as $article_tag )

    <h4 style="text-align: center">Tag : {{ $article_tag->tag_name}}</h4>

@endforeach



