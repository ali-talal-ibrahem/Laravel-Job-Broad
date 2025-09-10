<x-layout :title="$pageTitle">

        <h2>Comment by : {{ $comment->author }}</h2>

        @if ($comment->post)
        <h3>Related Post</h3>
        <ul>
                <li>
                        <strong>{{ $comment->post->title }}</strong>
                        <p>Author : {{ $comment->post->author }}</p>
                        <a href="{{ route('post.show' , $comment->post->id) }}">View Full Post</a>
                </li>
        </ul>
        @else
        <p>No Related post found for this comment</p>
        @endif

</x-layout>