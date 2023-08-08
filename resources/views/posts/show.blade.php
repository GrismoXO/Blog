{{-- <x-app-layout>
    
    <h1>{{ $post->title }}</h1>

    <img src="{{ asset('storage/'.$post->picture) }}" alt="Image de couverture" style="max-width: 300px;">

    <div>{{ $post->content }}</div>
    
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <textarea
                name="message"
                placeholder="{{ __('Veulliez écrire votre commantaire.') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('envoyer') }}</x-primary-button>
        </form>
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($post as $post)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $post->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $post->created_at->format('j M Y, g:i a') }}</small>
                                @unless ($post->created_at->eq($post->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>
                            @if ($post->user->is(auth()->user()))
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('post.edit', $post)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('post.destroy', $post) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('post.destroy', $post)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @endif
                        </div>
                        <p class="mt-4 text-lg text-gray-900">{{ $post->message }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout> --}}

{{-- <x-app-layout>
    
    <h1>{{ $post->title }}</h1>

    <img src="{{ asset('storage/'.$post->picture) }}" alt="Image de couverture" style="max-width: 300px;">

    <div>{{ $post->content }}</div>

    <p><a href="{{ route('posts.index') }}" title="Retourner aux articles" >Retourner aux posts</a></p>

</x-app-layout> --}}

<x-app-layout>
    <link
      href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div class="md:p-8 p-2 bg-white">
          <!--Banner image-->
          <img
            class="rounded-lg w-full"
            src="{{ asset('storage/'.$post->image) }}"
            
          />

          <!--Title-->
          <h1
            class="font-semibold text-gray-900 leading-none text-xl mt-1 capitalize truncate"
          >
            {{ $post->title}}
          </h1>
          <div class="flex items-center space-x-2 mt-5">
            <div>
              <!--Author name-->
              <p class="text-gray-900 font-semibold">{{ $post->user->name}}</p>
              <p class="text-gray-500 font-semibold text-sm">
                {{ $post->created_at->format('j M Y, g:i a')}}
              </p>
            </div>
        </div>
          <!--Description-->
          <div class="max-w-full">
            <p class="text-base font-medium tracking-wide text-gray-600 mt-1">
                {{ Str::limit($post->content)}}
            </p>
          </div>
        <p><a href="{{ route('posts.index') }}" title="Retourner aux articles" >Retourner aux posts</a></p>
    </div>
    </div>  
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('chirps.store', ['post' => $post->id]) }}">
            @csrf
            <textarea
                name="message"
                placeholder="{{ __('Veuillez écrire votre commantaire.') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('envoyer') }}</x-primary-button>
        </form>
        @foreach($post->chirps as $chirp)
        <div>
          <p>{{$chirp->user->name}}</p>
          <p>{{$chirp->message}}</p>
        </div>
        @endforeach
    </div>

        <!-- component -->
        <x-footer/>
    <script src="" async defer></script>
</x-app-layout>