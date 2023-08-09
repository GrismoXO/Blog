<x-app-layout>
  <link rel="stylesheet" href="{{ asset('/style.css') }}">
    <link
      href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        @foreach ($posts as $post)
        <div class="md:p-8 p-2 bg-white h">
          <!--Banner image-->
          <img class="rounded-lg w-fit image_index" src="{{ asset('storage/'.$post->image) }}"
            
          />

          <!--Title-->
          <h1
            class="font-semibold text-gray-900 leading-none text-xl mt-1 capitalize truncate"
          >
            {{ $post->title}}
          </h1>
          <!--Description-->
          <div class="max-w-full">
            <p class="text-base font-medium tracking-wide text-gray-600 mt-1">
                {{ Str::limit($post->content, 75)}}
            </p>
          </div>
          <div class="flex items-center space-x-2 mt-20 justify-between content-end">
            <div>
              <!--Author name-->
              <p class="text-gray-900 font-semibold">{{ $post->user->name}}</p>
              <p class="text-gray-500 font-semibold text-sm">
                {{ $post->created_at->format('j M Y, g:i a')}}
              </p>
            </div>
            <a href="{{ route('posts.show', $post)}}"> Voir plus ></a>
          </div>
        </div>  
        @endforeach


    </div>

        <!-- component -->
    <x-footer/>
    <script src="" async defer></script>
</x-app-layout>