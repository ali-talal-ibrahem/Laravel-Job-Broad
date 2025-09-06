<x-layout  :title="$pageTitle">

    <div class="text-center">
        <h1 class="text-2xl">{{ $post->title }}</h1>
        <p class="text-lg">{{ $post->bode }}</p>
        <p class="text-sm">{{ $post->author }}</p>
    </div>

</x-layout>
