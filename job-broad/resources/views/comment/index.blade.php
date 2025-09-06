<x-layout :title="$pageTitle">
    @foreach ($comments as $comment )
        <p>{{ $comment->id }}</p>
        <p>{{ $comment->author }}</p>
        <p>{{ $comment->content }}</p>
        <a href="/blog/{{ $comment->post->id }}"> Comment On The Post : {{ $comment->post->title }}</a>
        <hr>
    @endforeach
</x-layout>