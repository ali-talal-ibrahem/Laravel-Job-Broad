<x-layout :title="$pageTitle">

    <div class="text-center">
        <h1 class="text-2xl">{{ $tag->title }}</h1>
    </div>

    <h3>Related post</h3>
    <ul>
        @forelse ($tag->posts as $post )
        <li>
            <strong>{{ $post->title }}</strong>
            <p>Author : {{ $post->author }}</p>
            <a href="{{ route('post.show' , $post->id ) }}">View full Post</a>
        </li>
        @empty
        <p>No Posts are asscoiated with this tag</p>
        @endforelse
    </ul>
</x-layout>