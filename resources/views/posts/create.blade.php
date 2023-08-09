<x-app-layout>
    <link
    href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
    rel="stylesheet"
    />
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un post') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
    <div class="p-4 md:w-1/3 flex justify-center">

        <div class="my-5">
            @foreach ($errors->all() as $error)
            <span class=>{{$error}}</span> {{-- Affiche un message d'erreur si les champs requis du formulaire ne sont pas remplis --}}
            @endforeach
        </div>

        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class="flex flex-col  rounded-lg p-4" style="background-color: rgba(0, 0, 0, 0.075); border: 2px solid rgba(0, 0, 0, 0.048);"> 
        
            @csrf

            <label for="title" value="Titre du Post" class="p-4">Titre du post</label>
            <input id="title" name="title" class="rounded-lg">
            
            <label for="content" value="Contenu du Post" class="p-4">Contenu du Post</label>
            <textarea id="content" name="content" class="rounded-lg"></textarea>
            
            <label for="image" value="Image du Post" class="p-4">Image du Post</label>
            <input id="image" type="file" name="image" class="p-4 ">
            
            <button type="submit" class="py-2 px-4 mt-10 border bg-white rounded-lg">Enregistrer</button>
        </form>

    </div>
</div>
<x-footer />
</x-app-layout>