<x-app-layout>
    <link
      href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('/style.css') }}">
    <div class="flex justify-center  ">
        <div class="md:p-8 p-2 bg-white w-1/3 mt-4 rounded-xl">
          <!--Banner image-->
          <img class="rounded-lg w-full image_index" src="{{ asset('storage/'.$post->image) }}"
            
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
        <p class="text-end"><a href="{{ route('posts.index') }}" title="Retourner aux articles" ><< Retourner aux articles</a></p>
    </div>
    </div>  
    <div class="max-w-screen mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('chirps.store', ['post' => $post->id]) }}">
            @csrf
            <textarea name="message" placeholder="{{ __('Veuillez écrire votre commantaire.') }}" class="pl-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                <x-primary-button class="mt-4 mb-4">{{ __('envoyer') }}</x-primary-button>
            </form>
            @foreach($post->chirps as $chirp)
            <div class="p-4 bg-gray-50">
                <div class="flex items-center ">
                <p class="text-gray-900 font-semibold">{{ $post->user->name}}</p>
                <p class="text-gray-500 font-semibold text-sm ml-4">
                {{ $chirp->created_at->format('j M Y')}}
              </p></div>
              <p>{{$chirp->message}}</p>
            </div>
            @endforeach
    </div>

        <!-- component -->
        <x-footer/>
    <script src="" async defer></script>
</x-app-layout>