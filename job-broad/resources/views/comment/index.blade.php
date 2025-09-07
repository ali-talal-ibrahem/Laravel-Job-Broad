<x-layout :title="$pageTitle">
    @foreach ($comments as $comment )
        <p>Id Comment : {{$comment->id }}</p>
        <p class="text-4xl text-red-600">Author Comment : {{$comment->author }}</p>
        <p class="text-2xl text-gray-800">Comment : {{$comment->content }}</p>
        <a href="/blog/{{ $comment->post->id }}" class="text-blue-700"> Comment On The Post : {{ $comment->post->title }}</a>
        <hr>
    @endforeach
</x-layout>