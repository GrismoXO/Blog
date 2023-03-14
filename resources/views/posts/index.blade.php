<x-app-layout>
	<h1>Tous les articles</h1>
    
    
	<!-- Le tableau pour lister les articles/posts -->
	<table border="1" >
        <thead>
            <tr>
                <th>Titre</th>
				<th colspan="2" >Opérations</th>
			</tr>
		</thead>
		<tbody>
			<!-- On parcourt la collection de Post -->
			@foreach ($posts as $post)
			<tr>
                <td>
                    <!-- Lien pour afficher un Post : "posts.show" -->
					<a href="{{ route('posts.show', $post) }}" title="Lire l'article" >{{ $post->title }}</a>
				</td>
				<td>
                    <!-- Lien pour modifier un Post : "posts.edit" -->
					<a href="{{ route('posts.edit', $post) }}" title="Modifier l'article" >Modifier</a>
				</td>
				<td>
                    <!-- Formulaire pour supprimer un Post : "posts.destroy" -->
					<form method="POST" action="{{ route('posts.destroy', $post) }}" >
						<!-- CSRF token -->
						@csrf
						<!-- <input type="hidden" name="_method" value="DELETE"> -->
						@method("DELETE")
						<input type="submit" value="x Supprimer" >
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
    <x-primary-button class="mt-4">
        <a href="{{ route('posts.create') }}" title="Créer un article" >Créer un nouveau post</a>
    </x-primary-button>
</x-app-layout>