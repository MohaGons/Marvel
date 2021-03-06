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
                    <form method="post" action="{{ route('searchpersonnage') }}">
                        <input type="text" name="searchpersonnages">
                        <input type="submit" value="Recherche">
                        @csrf
                    </form>
                    @foreach($personnages as $personnage)
                    <li>[<a href="{{ route('detailpersonnage', $personnage->id) }}">{{ $personnage->firstname }} {{ $personnage->lastname }}</a>] <a href="{{ route('deletepersonnage' , $personnage->id) }}">[delete]</a></li>
                    @endforeach
                    {{ $personnages->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
