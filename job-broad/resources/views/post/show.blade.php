<x-layout :title="$pageTitle">

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div>
        <h1 class="text-3xl">{{ $post->title }}</h1>
        <p class="text-lg text-blue-700">{{ $post->body }}</p>
        <p class="text-sm">Post By : {{ $post->author }}</p>
        <hr class="my-4">

        <div class="pb-4">
            <h2 class="text-2xl text-green-700">Comments :</h2>
            <ul>
                @foreach ($post->comments as $comment )
                <div class="bg-gray-100 p-2 my-2 rounded hover:bg-gray-200">
                    <li class="text-2xl mb-2">{{ $comment->content }}</li>
                    <li><span class="text-red-700">Comment By : </span>{{ $comment->author }}</li>
                </div>
                @endforeach
            </ul>
        </div>
    </div>

    <form action="/comment" method="POST" class="mb-4 p-4 border border-gray-200 rounded-2xl">
        @csrf
 
        <input type="hidden" name="post_id" value="{{ $post->id }}">

        <div class="mb-2">
            <label for="author" class="block text-left font-semibold mb-1">Name : </label>
            <input type="text" name="author" id="author" value="{{ old('author') }}" rows="3" class="{{ $errors->has('author') ? "outline-red-600" : "outline-gray-200" }} outline  focus:outline-green-500 hover:outline-gray-400 rounded p-2" >
        </div>
        @error('author')
            <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
        @enderror

        <div class="mb-2">
            <label for="content" class="block text-left font-semibold mb-1"> Add a Comment: </label>
            <textarea name="content" id="content" rows="3" class="{{ $errors->has('content') ? "outline-red-600" : "outline-gray-200" }} w-full outline  focus:outline-green-500 hover:outline-gray-400 rounded p-2"></textarea>
        </div>
        @error('content')
            <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
        @enderror

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Submit</button>

    </form>



</x-layout>