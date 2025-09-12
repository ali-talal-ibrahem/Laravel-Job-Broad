<x-layout :title="$pageTitle">

    <!-- check message success with redirect to post page from create post page -->
    <!-- if isset message than print messagen and delete after refresh page  -->
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @elseif (session('update'))
    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('update') }}</span>
    </div>
    @elseif (session('delete'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('delete') }}</span>
    </div>
    @endif

    <!-- this button redirect to create post page -->
    <div class="my-2 flex gap-x-4 justify-end">
        <a href="post/create" class="flex-none rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-green-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
            Create a New Post
        </a>
    </div>

    <!-- loop all posts from database and print title body author -->
    @foreach ($posts as $post )
    <div class="flex justify-between items-center my-2 py-4 px-4 bg-blue-50/50 border border-gray-200 rounded-2xl shadow-sm hover:shadow-md">
        <div>
            <h2 class="text-2xl text-blue-900"><a href="/post/{{ $post->id }}">{{ $post->title }}</a></h2>
            <p class="text-lg">{{ $post->body }}</p>
            <p class="text-sm text-green-700">Author : {{ $post->author }}</p>
        </div>

        <!-- also have edit and delete button -->
        <div class="flex justify-between">
            <a href="post/{{ $post->id }}/edit" class="flex-none rounded-md bg-green-600 px-3.5 py-2.5 mx-1 text-sm font-semibold text-white shadow-xs hover:bg-green-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                Edit
            </a>
            <form method="POST" action="/post/{{ $post->id }}" onsubmit="return confirm('Are you sure you want to delete this post?')">
                @csrf
                @method('DELETE')
                
                <button type="submit" class="flex-none rounded-md bg-red-600 px-3.5 py-2.5 mx-1 text-sm font-semibold text-white shadow-xs hover:bg-red-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500 hover:cursor-pointer">
                    Delete
                </button>
            </form>
        </div>
    </div>
    @endforeach
    {{ $posts->links() }}
</x-layout>