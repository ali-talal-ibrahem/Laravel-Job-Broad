<x-layout :title="$pageTitle">

    @foreach ($tags as $tag )
    <div class="text-center my-4">
        <h2 class="text-2xl">{{ $tag->title }}</h2>
    </div>
    <hr>
    @endforeach

</x-layout>