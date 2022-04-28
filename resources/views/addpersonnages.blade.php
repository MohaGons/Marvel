<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un personnage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Formulaire d'ajout d'un personnage
                    <br><br>
                    <form method="post" action="{{ route('personnageadded') }}"><br>
                        Prénom: <input type="text" name="firstname" require="true"><br>
                        Nom de famille: <input type="text" name="lastname" require="true"><br>
                        Nom du personnage: <input type="text" name="charactername" require="true"><br>
                        Image: <input type="file" name="photo" require="true"><br>
                        Age: <input type="number" name="age"><br>
                        Pouvoir: <input type="text" name="power"><br>
                        Date de naissance: <input type="date" name="dateofbirth"><br>
                        Film dans lequel il a joué: <input type="text" name="filmsid"><br>
                        <input type="submit" value="Ajouter un personnage">
                        @csrf
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>