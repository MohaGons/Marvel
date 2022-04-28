<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Liste des personnages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button type="button" style="border: 0; line-height: 2.5; padding: 0 20px; font-size: 1rem; text-align: center; color: #fff; text-shadow: 1px 1px 1px #000; border-radius: 10px; background-color: black; background-image: linear-gradient(to top left, rgba(0, 0, 0, .2), rgba(0, 0, 0, .2) 30%, rgba(0, 0, 0, 0)); box-shadow: inset 2px 2px 3px rgba(255, 255, 255, .6), inset -2px -2px 3px rgba(0, 0, 0, .6);"><a href="{{ route('personnage') }}">Retour</a></button>
                    <br><br>
                    <h1>Détails sur {{ $personnages->firstname }} {{ $personnages->lastname }}</h1>
                    <br>
                    <table>
                        <tr>
                            <th><strong></strong></th>
                            <td> <img src="{{ asset('storage/image/'.$personnages->photo) }}" style="height: 100px; width: 150px;"> </td>
                        </tr>
                        <tr>
                            <th><strong> Surnom: </strong></th>
                            <td> {{ $personnages->charactername }} </td>
                        </tr>
                        <tr>
                            <th><strong> Age: </strong></th>
                            <td> {{ $personnages->age }} </td>
                        </tr>
                        <tr>
                            <th><strong> Pouvoir: </strong></th>
                            <td> {{ $personnages->power }} </td>
                        </tr>
                        <tr>
                            <th><strong> Date de naissance: </strong></th>
                            <td> {{ $personnages->dateofbirth }} </td>
                        </tr>
                        <tr>
                            <th><strong> Participation au film: </strong></th>
                            <td> {{ $personnages->films_id }} </td>
                        </tr>
                    </table>
                    <br><br>
                    Commentaires :
                    <ul>
                        @foreach($commentairesPersonnage as $commentaire)
                            <li>{{ $commentaire->created_at }} : {{ $commentaire->content }}</li>
                            @if($commentaire->user_id == Auth::id())
                                [<a href="{{ route('formupdatecommentaire', $commentaire->id) }}">update</a>]
                                [<a href="{{ route('deletecommentaire', $commentaire->id) }}">delete</a>]
                            @endif
                        @endforeach
                    </ul>
                    <br><br>
                    <form method="post" action="{{ route('postcommentairepersonnage', $personnages->id) }}">
                        <input type="text" name="commentaire">
                        <input type="submit" value="Poster un commentaire">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
