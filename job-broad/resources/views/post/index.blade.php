<x-layout :title="$pageTitle">

    @foreach ($posts as $post )
    <div class="text-center my-4">
        <h2 class="text-2xl">{{ $post->title }}</h2>
        <p class="text-lg">{{ $post->bode }}</p>
        <p class="text-sm">Author: {{ $post->author }}</p>
    </div>
    <hr>
    @endforeach

</x-layout>