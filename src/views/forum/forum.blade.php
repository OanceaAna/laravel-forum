@extends($layout)

@section('content')
    <h1>{{ $forum->name }} <a class="btn btn-sm btn-primary" href="{{ route('laravel-forum.write.post') }}">New Post</a></h1>

    <?php
        $posts = $forum->posts;
        $postCount = count($posts);
    ?>

    @if ($postCount > 0)
        <table class="table">
        @foreach($posts as $post)
            <?php $replies = $post->replies; $replyCount = count($post->replies); ?>
            <tr><td><a href="{{ route('laravel-forum.view.post', ['id' => $forum->id, 'fid' => $post->id]) }}">{{ $post->title }}</a></td>{{ $replyCount }}</tr>
        @endforeach
        </table>
    @else
        <p>There are currently no posts in this forum</p>
    @endif
@stop
