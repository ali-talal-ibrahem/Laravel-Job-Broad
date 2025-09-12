<x-layout :title="$pageTitle">
    <!-- form to create Post -->
    <form method="POST" action="/post/{{ $post->id }}">

        <!-- csrf to create token session -->
        @csrf
        @method('PUT')

        <!-- input hidden to id in request -->
        <input type="hidden" name="id" value="{{ $post->id }}" />

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm/6 text-gray-600">Use This Form To Edit a Post !</p>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <!-- Edit Tilte Post -->
                    <div class="sm:col-span-2">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Edit Title Post</label>
                        <div class="mt-2">
                            <input id="title" value="{{ old('title',$post->title) }}" type="text" name="title" autocomplete="given-name" placeholder="Tilte Post"
                                class="{{ $errors->has('title') ? 'outline-red-600' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        </div>
                        <!-- Valdation To title required -->
                        @error('title')
                        <p class="text-sm mt-4 text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Author Name  -->
                    <div class="sm:col-span-2">
                        <label for="author" class="block text-sm/6 font-medium text-gray-900">Edit Name</label>
                        <div class="mt-2">
                            <input id="author" value="{{ old("author",$post->author) }}" type="text" name="author" autocomplete="family-name" placeholder="Your Name"
                                class="{{ $errors->has('author') ? 'outline-red-600' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1  placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        </div>
                        <!-- Valdation To author required -->
                        @error('author')
                        <p class="text-sm mt-4 text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Input To contact -->
                    <div class="col-span-full">
                        <label for="body" class="block text-sm/6 font-medium text-gray-900">Edit Contant</label>
                        <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences contact article.</p>
                        <div class="mt-2">
                            <textarea id="body" name="body" rows="3"
                                class="{{ $errors->has('body') ? 'outline-red-600' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old("body",$post->body) }}</textarea>
                        </div>
                        <!-- Valdation to body required -->
                        @error('body')
                        <p class="text-sm mt-4 text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Selecte is published or no  -->
                    <div class="col-span-full">
                        <div class="flex gap-3">
                            <div class="flex h-6 shrink-0 items-center">
                                <div class="group grid size-4 grid-cols-1">
                                    <input type="checkbox" name="published" value="1" {{ old("published") || !old() && $post->published ? "checked" : ""}} aria-describedby="published-description" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                    <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                        <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                        <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                    </svg>
                                </div>
                            </div>
                            <div class="text-sm/6">
                                <label for="published" class="font-medium text-gray-900">Is Published</label>
                                <p id="published-description" class="text-gray-500">Do You Want it Published or save as draft ?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button Save and Cancel -->
            <div class="mt-6 flex items-center justify-start gap-x-6">
                <button type="submit" class="rounded-md bg-yellow-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-yellow-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">Edit</button>
                <a href="/post" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-red-600">Cancel</a>
            </div>
        </div>
    </form>

</x-layout>