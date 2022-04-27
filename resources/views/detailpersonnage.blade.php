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
                    <h1>Détails sur {{ $personnages->firstname }} {{ $personnages->lastname }}</h1>
                    <br>
                    <table>
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
                            <td> {{ $personnages->movie_id }} </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
