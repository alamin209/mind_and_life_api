<h2 style="text-align: center">Article Details </h2>
<hr>

<h4 style="text-align: center">Video : {{ $video->title }}</h4>

<h4 style="text-align: center">Type : {{ $video->type }}</h4>

<h4 style="text-align: center">Category : {{ $video->category->name ?? '' }}</h4>

<h4 style="text-align: center">Author : {{ $video->author->username ?? '' }}</h4>

<h4 style="text-align: center">Post Date : {{ $video->post_date }}</h4>

<h4 style="text-align: center">Tag Details </h4>

@foreach ($video->article_tags  as $article_tag )

    <h4 style="text-align: center">Tag : {{ $article_tag->tag_name}}</h4>

@endforeach

<h4 style="text-align: center"> Video

    @if ($video->type == 'link')
        <iframe width="100%" height="150" src="{{str_replace('youtu.be', 'youtube.com/embed',str_replace('watch?v=','embed/',$video->youtube_link))}}" title="{{$video->category_name}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    @else
        <video width="100%" height="150" controls><source src="{{$video->video_path}}" type="video/mp4"></video>
    @endif
</h4>



