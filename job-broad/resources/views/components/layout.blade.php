<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <title>Larvel{{ isset($title) ? " - " . $title . " Page" : "" }}</title>

</head>

<body>

  <div class="min-h-full">
    <nav class="bg-gray-900">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="shrink-0">
              <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                <x-nav-link href="/post" :active="request()->is('posts')">Posts</x-nav-link>
              </div>
            </div>
          </div>


          <!-- Link -->
          <div class="ml-4 flex items-center md:ml-6">
            @auth
            <span class="text-white mr-1">{{ Auth::user()->name }} | </span>
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="text-white hover:text-gray-300">
                Logout
              </button>
            </form>
            <el-dropdown class="relative ml-3">
              <button class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                <img src="https://avatars.githubusercontent.com/u/221844269?v=4" alt="" class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />
              </button>
            </el-dropdown>
          </div>
        </div>
      </div>
      @else
      <a href="/signup" class="text-gray-300 mx-3 hover:text-white p-2 rounded-sm">sign up</a>
      <a href="/login" class="text-gray-300 hover:text-white p-2 rounded-sm">login</a>
      @endauth
  </nav>

  @if (isset($title))
  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $title ?? ""}}</h1>
    </div>
  </header>
  @endif
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      {{ $slot }}
    </div>
  </main>
  </div>
</body>

</html>